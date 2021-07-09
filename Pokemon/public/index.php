<?php


// POINT D'ENTRÉE UNIQUE : 
// FrontController

// inclusion des dépendances via Composer
// autoload.php permet de charger d'un coup toutes les dépendances installées avec composer
// mais aussi d'activer le chargement automatique des classes (convention PSR-4)
require_once '../vendor/autoload.php';

$router = new AltoRouter();

if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
}
// sinon
else {
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
}

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => 'MainController'
    ],
    'homepage'
);

// Je crée la route pour List
$router->map(
    'GET',
    '/list',
    [
        'method' => 'list',
        'controller' => 'MainController'
    ],
    'list'
);

// Je crée la route pour Types
$router->map(
    'GET',
    '/types',
    [
        'method' => 'types',
        'controller' => 'MainController'
    ],
    'types-list'
);

$router->map(
    'GET',
    '/pokemon/[i:numero]',
    [
        'controller' => 'PokemonController',
        'method' => 'detail'
    ],
    'pokemon-detail'
);

$router->map(
     'GET',
     '/types/[i:id]',
     [
         'controller' => 'TypeController',
         'method' => 'pokemonType'
     ],
     'types'
 );


$match = $router->match();

if($match !== false) {
    // On récupère le controller à instancier
    //Tous nos controllers sont rangés dans le namespace Sonic\Controllers. On concatène donc ce namespace avant le nom de la classe
    $controllerToUse = "Pokedex\Controllers\\". $match['target']['controller'];
    // On récupère la méthode de controller à exécuter
    $methodToUse = $match['target']['method'];

    // On instancie le controller à utiliser. Son nom est stocké dans la variable $controllerToUse, celle-ci sera donc remplacée par le nom du controller à l'exécution
    $controller = new $controllerToUse();
    
    // On exécute la méthode dont le nom est stocké dans la variable $methodToUse;
    $controller->$methodToUse($match['params']);

} else {
    echo "Page 404 !";
}