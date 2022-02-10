<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="assets/img/logo.png" alt="Pokemon" width="auto" height="48">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Pokédex</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="https://github.com/Aworis/PokedexWebApp/blob/main/README.md" target="_blank">README.md</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <!--Search input-->
                    <input class="form-control me-2" type="text" id="pokemon-input" onkeyup="pokemonFilter()" placeholder="Suche nach Pokémon..." title="pokemonSearch">
                </div>
            </div>
        </div>
    </nav>
</header>