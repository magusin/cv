<?php 

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController {

    // Affichage de la liste (page d'accueil)
    public function list() {
        $pokemons = Pokemon::findAll();
        $this->show('list', [
            'title' => 'Accueil',
            'pokemons' => $pokemons
        ]);
    }

    // Affichage du détail
    public function detail($params) {

        $pokemon = Pokemon::find($params['numero']);
        $types = $pokemon->getTypes();
        $this->show('detail', [
            'title' => 'Accueil',
            'pokemon' => $pokemon,
            'types' => $types
        ]);
    }

    // Affichage des types
    public function types() {
        $types =  Type::findAll();
        $this->show('types', [
            'title' => 'Liste des types',
            'types' => $types
        ]);
    }
    
    // Affichage de la liste filtrée par type
    public function type($params) {

        $pokemons = Pokemon::findByType($params['type']);
        $this->show('list', [
            'title' => 'Filtré par type',
            'pokemons' => $pokemons
        ]);
    }

    
    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
        $this->show('error404', [
            'title' => 'Page inexistante - 404'
        ]);
    }

    public function show($viewName, $viewVars = [])
    {
        // On inclut les templates header et footer
        // ainsi que celui mis en paramètre ($viewName)
        include(__DIR__.'/../views/layout/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/layout/footer.tpl.php');
    }
}