<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gruppe25";
$DSN = "mysql:host=$servername;dbname=$database";

try {
    $conn = new PDO($DSN, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, bezeichnung, preis FROM produkte");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($stmt->fetchAll() as $k => $v) {
        echo "\n>";
        foreach ($v AS $value) {
            echo "| " . $value . " |";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
