<?php
require_once 'DB.php';
require_once 'PHPDB.php';



class Factory {

    static function Access(string $type): object {
        if ($type === "mysql") {
            return new DB();
        } elseif ($type === "file") {
            return new PHPDB();
        } else {
            die("Unbekannter Datenbanktyp: " . $type);
        } // schlechte Fehlerbehandlung!
    }

}

$obj_db = Factory::Access("mysql");
$obj_phpdb = Factory::Access("file");

