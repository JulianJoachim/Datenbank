

<?php

require_once 'PDO_Factory.php';
require_once 'DB.php';

echo "Willkommen bei der Demonstration der Lösung zu Aufgabe 4 von Gruppe 25\n\n";

$obj_db = Factory::Access("mysql");
echo "Zuerst oeffnen wir die Verbindung zur Datenbank.\n\n";
$obj_db->open();
echo "Hier fuegen wir nun 3 neue Produkte hinzu.\n\n";
$obj_db->insert(array('bezeichnung' => 'Ayran', 'preis' => 0.49));
$obj_db->insert(array('bezeichnung' => 'Fladenbrot', 'preis' => 1.77));
$obj_db->insert(array('bezeichnung' => 'Knoblauch', 'preis' => 0.55));

echo "\nNun werden wir mit 3 SELECT-Befehlen jene drei Produkte aus der Datenbank auf der Konsole ausgeben.\n\n";
$obj_db->query("bezeichnung", "Ayran");
$obj_db->query("bezeichnung", "Fladenbrot");
$obj_db->query("bezeichnung", "Knoblauch");

echo "Die Daten sind also alle erfolgreich gespeichert worden und lassen sich auch wieder auslesen.\n\n";

echo "Das wars erstmal, wir beenden die Verbindung.\n\n";
$obj_db->close();

echo "Einige Tage spaeter wurde Ayran aus dem Sortiment genommen. Wir oeffnen die Datenbankverbindung also erneut.\n\n";
$obj_db->open();

echo "Dieser wird nun mit einem DELETE Befehl aus der Datenbank geloescht.\n\n";
$obj_db->delete("bezeichnung", "Ayran");

echo "Das wars nun endgültig. Wir schließen die Verbindung erneut.\n\n";
$obj_db->close();


echo "Dasselbe wird nun mit der PHPDB gemacht. Hier wird das ganze jedoch Lokal in einer .txt gespeichert.\n\n";
$obj_phpdb = Factory::Access("file");
echo "Wir 'oeffnen' wieder die Verbindung. Das heißt, es wird die .txt Datei eingelesen und deserialisiert. Da das der Erste Zugriff ist, wird stattdessen ein leeres Array generiert.\n\n";
$obj_phpdb->open();
echo "Es werden nun allerlei Testdaten in das Array eingelesen.\n\n";
$obj_phpdb->insert(array('id' => 4, 'bezeichnung' => 'Ayran', 'preis' => 0.49));
$obj_phpdb->insert(array('id' => 8, 'bezeichnung' => 'Doenerfleisch', 'preis' => 3.49));
$obj_phpdb->insert(array('id' => 12, 'bezeichnung' => 'Schafskaese', 'preis' => 1.11));
echo "Ein Kunde will den Preis für Ayran wissen. Dafuer suchen wir nach dem Artikel mit unserer Query-Methode.\n\n";
$obj_phpdb->query("bezeichnung", "Ayran");
echo "Der Kunde ist ueber den Preis zufrieden und kauft alle Ayran. Der Artikel ist also leer und muss ueber die delete-methode entfernt werden.\n\n";
$obj_phpdb->delete("id", "4");
echo "Wir suchen jetzt erneut nach dem Ayran. Der Artikel wird aber nicht mehr gefunden.\n\n";
$obj_phpdb->query("id", "4");
echo "Nun wird die Verbindung geschlossen. Das bedeutet in dem Falle, das das Array in die Textdatei 'produkteDaten.txt' serialisiert wird.\n\n";
$obj_phpdb->close();
echo "Es wurde nachgeliefert und Ayran wird nun doch wieder angeboten. Also wird das Array wieder mit den Werten aus der Datei gefüllt.\n\n";
$obj_phpdb->open();
echo "Wir inserten den Ayran erneut in die Datenbank und geben es anschließend testweise aus.\n\n";
$obj_phpdb->insert(array('id' => 4, 'bezeichnung' => 'Ayran', 'preis' => 0.49));
$obj_phpdb->query("id", "4");
echo "Alles klappt. Die Datenbank wird abschließen wieder geschlossen.\n\n";
$obj_phpdb->close();
?>

