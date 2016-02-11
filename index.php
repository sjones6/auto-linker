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

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/config/database.php';

require __DIR__ . '/App/start.php';
