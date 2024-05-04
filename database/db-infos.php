<?php

include_once 'implement.php';

$dns = 'localhost';
$dbname = 'icrud';
$username = 'root';
$password = '';


/*


...


*/


$database = new implement($dns, $dbname, $username, $password);
$database->connection();
