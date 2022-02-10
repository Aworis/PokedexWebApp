
function pokemonFilter() {
    var input, filter, i, pokemonHeader, pokeTitle;
    input = document.getElementById('pokemon-input');
    filter = input.value.toUpperCase();
    pokemonHeader = document.getElementsByClassName('pokemon-card');
    
    for (i = 0; i < pokemonHeader.length; i++) {
        pokeTitle = pokemonHeader[i];
        if (pokeTitle.innerHTML.toUpperCase().indexOf(filter) > -1) {
            pokemonHeader[i].style.display = '';
        } else {
            pokemonHeader[i].style.display = 'none';
        }
    }
}