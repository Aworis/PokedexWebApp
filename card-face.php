<?
// Database connection
require_once('db-server-connector.php');

mysqli_select_db($dbConnection, 'db_pokemon');
$sql = 'SELECT * FROM pokemon';

$queryResult = mysqli_query($dbConnection, $sql);
if (!$queryResult)
{
    die('Ungültige Abfrage: ' . mysqli_error($dbConnection));
}


/*
* Output of the data, wrapped in Bootstrap cards.
* Example: https://write.corbpie.com/php-mysql-loop-with-bootstrap-4-columns/
*/

// Number of Bootstrap columns
$widthSml = 6;
$widthMed = 6;
$widthLg = 4;
$widthXl = 3;

echo '<div class="container">';
    echo '<div id="pokemon-row" class="row row-flex justify-content-center">';

    while ($databaseRow = mysqli_fetch_array($queryResult, MYSQLI_ASSOC))
    {
        // Card face
        echo "<div class='pokemon-card my-3 col-sm-$widthSml col-md-$widthMed col-lg-$widthLg col-xl-$widthXl'>";
            echo '<div class="inner-card card ' . $databaseRow['type1'] . '" onclick="showPokemonDetails()" style="display: flex">';

                // Card face headline
                echo '<h2 class="pokemon-header text-center fs-4 fw-bold">' . '#' . $databaseRow['pokemonindex'] . ' ' . $databaseRow['name'] . '</h2>';
                
                // Card face Pokemon type
                echo '<span class="tag-'.$databaseRow['type1'].'">' . $databaseRow['type1'] . '</span>' . '<span class="tag-'.$databaseRow['type2'].'">' . $databaseRow['type2'] . '</span>';

                // Card face background image
                echo '<img src="./assets/img/bg-pokeball.svg" class="pokeball-image">';

                // Card face Pokemon image
                echo '<img src="./assets/pokemon-img/' . $databaseRow['pokemonindex'] . '.png"' . ' class="pokemon-image">';
                
            echo '</div>';
            echo '<div class="layer-between" style="display: none"></div>';
        echo '</div>';
                
    }
    echo '</div>';
echo '</div>';
mysqli_free_result($queryResult);