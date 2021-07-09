<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Type {

    private $id;
    private $name;
    private $color;


//     select *
// FROM type
// INNER JOIN pokemon_type
// ON type.id = pokemon_type.type_id
// INNER JOIN pokemon
// ON pokemon_type.type_id = pokemon.numero
     /**
      * Get the value of name
      */ 
      public function getName()
      {
           return $this->name;
      }
 
      /**
       * Set the value of name
       *
       * @return  self
       */ 
      public function setName($name)
      {
           $this->name = $name;
 
           return $this;
      }

          /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Récupérer tous les pokémons mis en avant sur la home
     * 
     * @return Type[]
     */
    public function findAllTypes()
    {
        $pdo = Database::getPDO();
        $sql = "
            SELECT *
            FROM `type`";
        $pdoStatement = $pdo->query($sql);
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Pokedex\Models\Type');
        
        return $types;
        
    }

    // permet de récupérer l'ensemble des types correspondant
    // à un numéro de pokemeon
    public function findAllTypesByPokemonNumber ($pokemonNumber)
    {
        $pdo = Database::getPDO();
        $sql = "
            SELECT type.*
            FROM `type`
            INNER JOIN pokemon_type
            ON (pokemon_type.type_id = type.id)
            WHERE pokemon_type.pokemon_numero = $pokemonNumber";
        $pdoStatement = $pdo->query($sql);
        
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Pokedex\Models\Type');
        
        return $types;
    }

    


}