<?php

//$DSN = 'mysql:host=localhost;dbname=gruppe25';
//$DB_USER = 'root';
//$DB_PW = '';
//$DB_options = array(
//    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
//try {
//    $db = new PDO($DSN, $DB_USER, $DB_PW, $DB_options);
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//} catch (PDOException $err) {
//    echo 'DB ERROR: ' . $err->getMessage() . PHP_EOL;
//}

$servername = "localhost";
$username = "root";
$password = "";
$database = "gruppe25";
$DSN = "mysql:host=$servername;dbname=$database";

try {
  $conn = new PDO($dsn, $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>


