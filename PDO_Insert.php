<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gruppe25";
$DSN = "mysql:host=$servername;dbname=$database";

try {
    $conn = new PDO($dsn, $username, $password);
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO produkte (bezeichnung, preis)
    VALUES ('Quark', 0.40)";
// use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

