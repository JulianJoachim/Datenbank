<?php
require_once 'iDatabase.php';

class PHPDB implements iDatabase {

    public $produkteArray;

    public function open(): void {
        if (file_exists("C:/xampp/htdocs/Abgabe 4/produkteDaten.txt") && !(file_get_contents("C:/xampp/htdocs/Abgabe 4/produkteDaten.txt") === "")) {
            echo "Das Array wird gefuellt...\n\n";
            $this->produkteArray = unserialize(file_get_contents("C:/xampp/htdocs/Abgabe 4/produkteDaten.txt"));
        } else {
            echo "Erster Durchlauf. Neues Array wird angelegt...\n\n";
            $this->produkteArray = array();
        }
    }

    public function insert($record) {
        $hit = false;
        foreach ($this->produkteArray as $key => $value) {
            foreach ($value AS $v) {
                if (current($record) === $v) {
                    $hit = true;
                }
            }
        }

        if ($hit == false) {
            echo "Neuer Eintrag angelegt.\n";
            $this->produkteArray[] = $record;
        }
    }

    public function query($name, $string) {
        $resultOfQuery = array();
        foreach ($this->produkteArray as $key => $value) {
            foreach ($value AS $v) {
                if ($v == $string) {
                    $resultOfQuery = $value;
                }
            }
        }

        if (sizeof($resultOfQuery) === 0) {
            echo "\nEintrag nicht in der Datenbank vorhanden.\n\n";
        } else {
            foreach ($resultOfQuery as $v) {
                echo $v . "\n";
            }
            echo "\n";
        }
    }

    public function delete($name, $string) {
        $resultOfQuery = array();
        foreach ($this->produkteArray as $key => $value) {
            foreach ($value AS $v) {
                if ($v == $string) {
                    unset($this->produkteArray[$key]); 
                   echo "Eintrag erfolgreich geloescht. \n\n";
                }
            }
        }

        foreach ($resultOfQuery as $v) {
            echo "\n" . $v;
        }
    }

    public function close(): void {
        file_put_contents("C:/xampp/htdocs/Abgabe 4/produkteDaten.txt", serialize($this->produkteArray));
        echo "Array gesichert - Zugriff wird geschlossen.";
    }

//put your code here
}
?>

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

