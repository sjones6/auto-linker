<?php

require('API/books.php');
require('API/db_creds.php');

$queries = array();
$lines_of_text = array();
$file = 'db/sbl_gnt_CSV.csv';

$file_handle = fopen($file, 'r');

while ( !feof($file_handle) ) {
    $lines_of_text[] = fgetcsv($file_handle);
}
$i = 0;
$type = 'GT';

foreach ( $lines_of_text as $line ) {

    $book = $line[0];
    $chapter = $line[1];
    $verse = $line[2];
    $gt = $line[3];
    
    foreach ( $book_names as $name ) {
        $bookDefault = $name->return_default_name($book);
        if ( $bookDefault ) {
            $book = $bookDefault;
            break;
        }
    }
    
    $id_query = "SELECT id FROM verses 
        WHERE Book = '$book' &&
            Chapter = $chapter &&
            Verse = $verse";
    
    $id_object = mysqli_query($mysqli, $id_query);
    $id_array = mysqli_fetch_array($id_object);
    $id = $id_array[0];

    $queries[] = "UPDATE texts SET type = '$type', GT = '$gt'
                WHERE id = $id";
}

array_shift($queries); //Deletes queries[0] (header column)

$count = 0;
foreach ( $queries as $query ) {
    if ( mysqli_query($mysqli, $query) ) {
        $count++;
    } else {
        echo("Something went wrong.<br/>");
        echo("MySQL Error: " . $mysqli->error);
        die;
    }
}

echo("$count rows succefully modified. Check DB."); 


