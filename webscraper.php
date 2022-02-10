<?php
// Creation of database and table
require_once 'db-create.php';
mysqli_select_db($dbConnection, 'db_pokemon');


// Webscraper www.bisafans.de
$numberOfPokemon = 151;

for ($i = 1; $i <= $numberOfPokemon; $i++) {

    // Adjustment of the URL depending on the Pokemon index
    if ( $i <= 9 ) {$pokemonIndex = '00' . $i;}
    if ( $i >= 10 && $i <= 99 ) {$pokemonIndex = '0' . $i;}
    if ( $i >= 100 && $i <= 999 ) {$pokemonIndex = $i;}

    // Composer Autoloader with Guzzle
    require 'vendor/autoload.php';
    $httpClient = new \GuzzleHttp\Client();
    $response = $httpClient->get('https://www.bisafans.de/pokedex/' . $pokemonIndex . '.php');

    $htmlString = (string) $response->getBody();
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($htmlString);
    $xpath = new DOMXPath($doc);


    // XML node with corresponding data
    $pokemonName = $xpath->evaluate('//input[@id="name"]/@placeholder');
    $pokemonType1 = $xpath->evaluate('/html/body/div[1]/div[1]/div/div/div[2]/section/div[5]/div[1]/div[2]/div/div[1]/div[1]/div/div[2]/dl/dd[1]/ul/li/a[1]/img/@alt');
    $pokemonType2 = $xpath->evaluate('/html/body/div[1]/div[1]/div/div/div[2]/section/div[5]/div[1]/div[2]/div/div[1]/div[1]/div/div[2]/dl/dd[1]/ul/li/a[2]/img/@alt');
    $pokemonSize = $xpath->evaluate('//html/body/div[1]/div[1]/div/div/div[2]/section/div[5]/div[1]/div[2]/div/div[1]/div[1]/div/div[2]/dl/dd[2]');
    $pokemonWeight = $xpath->evaluate('//html/body/div[1]/div[1]/div/div/div[2]/section/div[5]/div[1]/div[2]/div/div[1]/div[1]/div/div[2]/dl/dd[3]');
    $pokemonGender = $xpath->evaluate('//html/body/div[1]/div[1]/div/div/div[2]/section/div[5]/div[1]/div[2]/div/div[1]/div[1]/div/div[2]/dl/dd[4]');
    
    $ifPokemonType2IsTrue = $xpath->evaluate('boolean(/html/body/div[1]/div[1]/div/div/div[2]/section/div[5]/div[1]/div[2]/div/div[1]/div[1]/div/div[2]/dl/dd[1]/ul/li/a[2]/img/@alt)');





    // Extract data from nodes
    foreach ($pokemonName as $name) {
        $name = $name->textContent;
    }

    foreach ($pokemonType1 as $type1) {
        $type1 = $type1->textContent;
    }

    if ($ifPokemonType2IsTrue == true) {
        foreach ($pokemonType2 as $type2) {
            $type2 = $type2->textContent;
        }
    } else {
        $type2 = NULL;
    }

    foreach ($pokemonSize as $size) {
        $size = $size->textContent;  
    }

    foreach ($pokemonWeight as $weight) {
        $weight = $weight->textContent;  
    }

    foreach ($pokemonGender as $gender) {
        $gender = $gender->textContent;  
    }
    

    // Write data to db
    $result = $dbConnection->query("SELECT name FROM pokemon WHERE name = '$name'");
    
    if(!$result->num_rows) {
        $sqlPokemonRow = "INSERT INTO pokemon (name, type1, type2, size, weight, gender, pokemonindex) VALUES ('$name', '$type1', '$type2', '$size', '$weight', '$gender', '$pokemonIndex')";
        $dbConnection->query($sqlPokemonRow);
    }


    // Download Pokemon images
    ini_set("allow_url_fopen", true);
    $pokemonImgUrl = 'https://media.bisafans.de/93ac23b/thumbs/300x300/pokemon/artwork/' . $pokemonIndex . '.png';
    
    $img = 'assets/pokemon-img/' . $pokemonIndex . '.png';
    file_put_contents($img, file_get_contents($pokemonImgUrl));
    
}

echo '<br>Vorgang abgeschlossen!';
echo '<br><a href="/">Zurück zum Pokédex</a>';