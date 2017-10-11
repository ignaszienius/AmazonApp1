<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'suppressed';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// UTF8 charsetas
$db->set_charset("utf8");

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}