<?php
/*
* Rewrite so that this accepts an array of parameters (Book, Chapter, Verse)
* And returns an array of verse ID's in a JSON object.
*/


//Confirm all data is received and is the expected type
if (    ( isset($_GET['book']) ) &&
        ( !preg_match('/\W/', $_GET['book']) ) &&
        ( isset($_GET['chapter']) ) &&
        ( !preg_match('/\D/', $_GET['chapter']) ) &&
        ( isset($_GET['verse']) ) &&
        ( !preg_match('/\D/', $_GET['verse']) )
    ) {
            
    require('db_creds.php');
    
    $book = $_GET['book'];
    $ch = $_GET['chapter'];   
    $verse = $_GET['verse'];

    //prepare MySQL statement and bind parameters
    $get_verse_id_query = $mysqli->prepare("SELECT id FROM verses 
        WHERE Book = ? AND
        Chapter = ? AND
        Verse = ?");
    $get_verse_id_query->bind_param('sdd', $book, $ch, $verse);

    if ( $get_verse_id_query->execute() ) {

        $get_verse_id_query->bind_result($id);
        $get_verse_id_query->fetch();
        $get_verse_id_query->close();

        if ( isset($id) ) {
                echo $id;
        } else {
            echo 'none';
        }
    } else { //query for entry ID fails
        
        echo("Sorry, we couldn't process that request.");
        
    }
    
} else { //GET request invalide
            
    echo("Sorry, we couldn't process that request.");
            
}