<?
// Creation of the database
require_once 'db-server-connector.php';

$sqlCreateDb = 'CREATE DATABASE db_pokemon';
if ($dbConnection->query($sqlCreateDb) === TRUE) {
  echo 'Datenabnk erfolgreich erstellt!<br>';
} else {
  echo 'Datenbank konnte nicht erstellt werden: ' . $dbConnection->error . '<br>';
}


// Creation of the table
mysqli_select_db($dbConnection, 'db_pokemon');
$sqlPokemon = "CREATE TABLE pokemon 
( 
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name varchar(30),
  type1 varchar(30),
  type2 varchar(30),
  size varchar(30),
  weight varchar(30),
  gender varchar(30),
  pokemonindex varchar(3)
)";
    
if ($dbConnection->query($sqlPokemon) === TRUE) {
    echo 'Tabelle pokemon erfolgreich erstellt<br>';
} else {
    echo 'Tabelle Pokemon konnte nicht erstellt werden: ' . $dbConnection->error . '<br>';
}