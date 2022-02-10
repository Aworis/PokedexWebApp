<?
// Database connection
$servername = 'db';
$user = 'root';
$pw = 'root';

$dbConnection = new mysqli($servername, $user, $pw);

if ($dbConnection->connect_error) {
    die('Die Verbindung zur Datenbank konnte nicht aufgebaut werden. '.$dbConnection->connect_error);
}