<?php

//For deployment, comment out localhost db credentials and
//Uncomment Bluehost db credentials.

//Localhost
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '1078';
$db_database = 'texts';

$mysqlDBString = "mysql:host=" . $db_hostname . ";dbname=" . $db_database;




try {
    $dbh = new PDO($mysqlDBString, $db_username, $db_password);
} catch ( PDOException $e ) {
        echo( json_encode( array("error" => "Sorry, we couldn't process that request: " . $e) ) );
}
