<?php

include_once 'implement.php';

$dns = 'localhost';
$dbname = 'your-db-name';
$username = 'root';
$password = '';


/*


...


*/


$database = new implement($dns, $dbname, $username, $password);
$database->connection();


?>