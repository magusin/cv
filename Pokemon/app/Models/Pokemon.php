<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Pokemon {

     private $id;
     private $nom;
     private $pv;
     private $attaque;
     private $defense;
     private $attaque_spe;
     private $defense_spe;
     private $vitesse;
     private $numero;
     private $type_name;


     

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
      * Get the value of nom
      */ 
     public function getNom()
     {
          return $this->nom;
     }

     /**
      * Set the value of nom
      *
      * @return  self
      */ 
     public function setNom($nom)
     {
          $this->nom = $nom;

          return $this;
     }

     /**
      * Get the value of pv
      */ 
     public function getPv()
     {
          return $this->pv;
     }

     /**
      * Set the value of pv
      *
      * @return  self
      */ 
     public function setPv($pv)
     {
          $this->pv = $pv;

          return $this;
     }

     /**
      * Get the value of attaque
      */ 
     public function getAttaque()
     {
          return $this->attaque;
     }

     /**
      * Set the value of attaque
      *
      * @return  self
      */ 
     public function setAttaque($attaque)
     {
          $this->attaque = $attaque;

          return $this;
     }

     /**
      * Get the value of defense
      */ 
     public function getDefense()
     {
          return $this->defense;
     }

     /**
      * Set the value of defense
      *
      * @return  self
      */ 
     public function setDefense($defense)
     {
          $this->defense = $defense;

          return $this;
     }

     /**
      * Get the value of attaque_spe
      */ 
     public function getAttaque_spe()
     {
          return $this->attaque_spe;
     }

     /**
      * Set the value of attaque_spe
      *
      * @return  self
      */ 
     public function setAttaque_spe($attaque_spe)
     {
          $this->attaque_spe = $attaque_spe;

          return $this;
     }

     /**
      * Get the value of defense_spe
      */ 
     public function getDefense_spe()
     {
          return $this->defense_spe;
     }

     /**
      * Set the value of defense_spe
      *
      * @return  self
      */ 
     public function setDefense_spe($defense_spe)
     {
          $this->defense_spe = $defense_spe;

          return $this;
     }

     /**
      * Get the value of vitesse
      */ 
     public function getVitesse()
     {
          return $this->vitesse;
     }

     /**
      * Set the value of vitesse
      *
      * @return  self
      */ 
     public function setVitesse($vitesse)
     {
          $this->vitesse = $vitesse;

          return $this;
     }

     /**
      * Get the value of numero
      */ 
     public function getNumero()
     {
          return $this->numero;
     }

     /**
      * Set the value of numero
      *
      * @return  self
      */ 
     public function setNumero($numero)
     {
          $this->numero = $numero;

          return $this;
     }

         /**
     * Récupérer tous les pokémons mis en avant sur la home
     * 
     * @return Pokemon[]
     */
    public function find($numero)
    {

        $pdo = Database::getPDO();

        $sql = "SELECT *
        FROM pokemon
        WHERE numero = $numero
        ";

        $pdoStatement = $pdo->query($sql);

        return $pdoStatement->fetchObject(self::class);
    }

    public function findAllHomepage()
    {
        // 1) On déclare la requete SQL
        $sql = 'SELECT * FROM pokemon';

        // 2) On récupère l'objet PDO
        $pdo = Database::getPDO();

        // 3) On execute la requete
        $pdoStatement = $pdo->query($sql);

        // 4) On récupère les résultats
        // Un tableau d'objets de la classe Type
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Pokedex\Models\Pokemon');

        // 5) On retourne le résultat
        return $results;
    }

    

     /**
      * Get the value of type_name
      */ 
     public function getType_name()
     {
          return $this->type_name;
     }

     /**
      * Set the value of type_name
      *
      * @return  self
      */ 
     public function setType_name($type_name)
     {
          $this->type_name = $type_name;

          return $this;
     }
}