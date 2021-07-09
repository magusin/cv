<?php


namespace Pokedex\Controllers;
use Pokedex\Utils\Database;
use PDO;
use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;
use Pokedex\Controllers\CoreController;

class TypeController extends CoreController
{
     public function pokemonType($params) 
     {
        $pokemonNumber = $params['pokemon_numero'];

        // On instancie le model (Classe Category)
        $pokemonObject = new Pokemon();
        $pokemonDetail = $pokemonObject->find($pokemonNumber);
        $typeObject = new Type();
        $pokemonTypesList = $typeObject->findAllTypesByPokemonNumber($pokemonNumber);

         $dataArray = [
            'pokemonDetail' => $pokemonDetail,
           'pokemonTypesList' => $pokemonTypesList,
            'title' => 'Pokemon'
        ];

        $this->show('pokemon/type', $dataArray);
        
    }
}