<?php


namespace Pokedex\Controllers;
use Pokedex\Utils\Database;
use PDO;
use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;
use Pokedex\Controllers\CoreController;

class PokemonController extends CoreController
{
    public function detail($params)
    {
        $numero = $params['numero'];

        // On instancie le model (Classe Category)
        $pokemonObject = new Pokemon();
        $pokemonDetail = $pokemonObject->find($numero);
        $typeObject = new Type();
        $pokemonTypesList = $typeObject->findAllTypesByPokemonNumber($numero);

         $dataArray = [
            'pokemonDetail' => $pokemonDetail,
           'pokemonTypesList' => $pokemonTypesList,
            'title' => 'Pokemon'
        ];

        $this->show('pokemon/detail', $dataArray);
        
    }


}