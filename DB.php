<?php

/**
 * Description of newPHPClass
 *
 * @author JulianJ
 */
require_once 'iDatabase.php';

class DB implements iDatabase {

    public $conn;

    public function open(): void {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "gruppe25";
        $DSN = "mysql:host=$servername;dbname=$database";

        try {
            $this->conn = new PDO($DSN, $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Verbindung erfolgriech aufgebaut\n\n";
        } catch (PDOException $e) {
            echo "Verbindungsversuch fehlgeschlagen: " . $e->getMessage();
        }
    }

    public function insert($record) {
        try {
            $sql = "INSERT INTO produkte (bezeichnung, preis)
             VALUES (\"$record[bezeichnung]\",$record[preis])";
            $this->conn->exec($sql);
            echo "Neuer Eintrag angelegt.\n";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        
    }

    public function query($name, $string) {
        $counter = false;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM produkte WHERE $name = '$string' LIMIT 1");
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($stmt->fetchAll() as $k => $v) {
                foreach ($v AS $value) {
                    echo " | " . $value;
                    $counter = true;
                }
                echo "\n\n";
            }
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }

        if ($counter === false) {
            echo "Eintrag nicht in der Datenbank vorhanden.\n\n";
        }
    }

    public function delete($name, $string) {
        try {
            $sql = "DELETE FROM produkte WHERE $name = '$string' LIMIT 1";
            $this->conn->exec($sql);
            echo "Eintrag erfolgreich geloescht. \n\n";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function close(): void {
        $this->conn = null;
        echo "Verbindung geschlossen.\n\n";
    }

//put your code here
}

?>
