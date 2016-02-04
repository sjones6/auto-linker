<?php

require('API/books.php');
require('API/db_creds.php');

$queries = array();
$lines_of_text = array();
$file = 'db/leb.csv';

$file_handle = fopen($file, 'r');

while ( !feof($file_handle) ) {
    $lines_of_text[] = fgetcsv($file_handle);
}
$i = 0;
$type = 'ET';

foreach ( $lines_of_text as $line ) {

    $id = $line[0];
    $book = $line[1];
    $chapter = $line[2];
    $verse = $line[3];
    $et = $mysqli->real_escape_string($line[4]);
    

    foreach ( $book_names as $name ) {
        $bookDefault = $name->return_default_name($book);
        if ( $bookDefault ) {
            $book = $bookDefault;
            break;
        }
    }

    $queries[] = "INSERT INTO verses (id, Book, Chapter, Verse) VALUES ($id, '$book', '$chapter', '$verse')";
    $queries[] = "INSERT INTO texts (id, type, ET) VALUES ($id, '$type', '$et')";
}

array_shift($queries); //Deletes queries[0] which is column headers.
array_shift($queries); //Deletes queries[1] which is column headers.

foreach ( $queries as $query ) {
    if ( mysqli_query($mysqli, $query) ) {
        echo("all finished. Check DB.");
    } else {
        echo("something went wrong.");
        echo($mysqli->error);
        die;
    }
}

