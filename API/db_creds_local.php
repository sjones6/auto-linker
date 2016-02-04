<?php

//Close attempted connection for production site.
$dbh = null;

//Localhost
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '1078';
$db_database = 'texts';


//Bluehost 
/*
$db_hostname = 'localhost';
$db_username = 'spencfm0_alinker';
$db_password = 'gohome';
$db_database = 'spencfm0_autolinkerTexts';
*/

$mysqlDBString = "mysql:host=" . $db_hostname . ";dbname=" . $db_database;




try {
    $dbh = new PDO($mysqlDBString, $db_username, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
} catch ( PDOException $e ) {
        echo( json_encode( array("error" => "Sorry, we couldn't process that request: " . $e) ) );
}