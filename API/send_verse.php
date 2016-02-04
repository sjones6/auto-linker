<?php
/*This accepts a GET request with four parameters:
* Book (string)
* Chapter (Int)
* Verse (Int)
* Closing Verse (Int or 'not-range')
*
* The return value is a JSON object with the book, chapter, verse, and text
* of the verse as keys or an error as key. */


//Comment out for production.
error_reporting(E_ALL);
ini_set("display_errors", 1);

//Confirm all data is received and is the expected type
if (    ( isset($_GET['book']) ) &&
        ( preg_match('/\d*\s?\w*/', $_GET['book']) ) &&
        ( isset($_GET['chapter']) ) &&
        ( !preg_match('/\D/', $_GET['chapter']) ) &&
        ( isset($_GET['verse']) ) &&
        ( !preg_match('/\D/', $_GET['verse']) ) &&
        ( isset($_GET['closingVerse']) ) &&
        ( preg_match('/\d*|not-range/', $_GET['closingVerse']) )
    ) {
        
    //Add file for your local environment.
    //require('db_creds.php');
    include('db_creds_local.php');
    
    //Check book name for match in either primary (=database form) or secondary form.
    require('books.php');
    $book = $_GET['book'];
    $ch = $_GET['chapter'];   
    $verse = $_GET['verse'];
    $range = ( $_GET['closingVerse'] === 'not-range' ) ? $verse : $_GET['closingVerse'];
    
    foreach ( $book_names as $book_name ) {
        
        $bookDefault = $book_name->return_default_name($book);
        
        if ( $bookDefault ) {
            break; //exit foreach
        } 
    }
    
    if ( !$bookDefault ) {
            $errorMsg = array("error" => "$book doesn't exist in our database.");
            echo( json_encode($errorMsg) );
            die;
    }
    
    //prepare MySQL statement and bind parameters
    $get_verse_id_query = $dbh->prepare(
        "SELECT verses.id, verses.Book, verses.Chapter, verses.Verse, texts.ET FROM verses
            LEFT JOIN texts ON verses.id = texts.id    
        WHERE verses.Book = :book AND
        verses.Chapter = :chapter AND
        verses.Verse >= :verse AND
        verses.Verse <= :range"
    );
    $get_verse_id_query->bindParam(':book', $bookDefault);
    $get_verse_id_query->bindParam(':chapter', $ch);
    $get_verse_id_query->bindParam(':verse', $verse);
    $get_verse_id_query->bindParam(':range', $range);

    if ( $get_verse_id_query->execute() ) {
        
        if ( $verses = $get_verse_id_query->fetchAll() ) {

           $englishTranslation = array();
            foreach ( $verses as $singleVerse ) {
                $englishTranslation[] = $singleVerse[4];
                $range = $singleVerse[3];
            }
            $et = join($englishTranslation, ' ');
            
            
            $verse_array = array(
                    'book' => $bookDefault,
                    'chapter' => $ch,
                    'verse' => $verse,
                    'range' => $range,
                    'ET' => $et
                    );        
            $verse_object = json_encode($verse_array);
            echo($verse_object);
            
        } else {
            
            echo( json_encode( array("error" => "That book doesn't exist in our database.") ) );    
        }

        $get_verse_id_query = null;
            
                
    } else { //query for entry fails
        
        echo( json_encode( array("error" => "Sorry, we couldn't process that request. 1") ) );
        
    }
    
} else { //GET request invalid
            
    echo( json_encode( array("error" => "Sorry, we couldn't process that request.") ) );
            
} 