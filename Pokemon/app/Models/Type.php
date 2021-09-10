<?php 


namespace Pokedex\Models;


use \PDO;
use \PDOException;

class Type extends CoreModel {

    /** 
     * Propriétés stockant les informations du type
     */
    private $name;
    private $color;
    private $id;

    /**
     * Création de getters  (pas besoin de setters pour notre utilisation !
     * afin de récupérer les valeurs des propriétés
     */ 
    public function getName()
    {
        return $this->name;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getId()
    {
        return $this->id;
    }

    /** 
     * Méthode statique permettant de récupérer la liste des types
     */
    static public function findAll()
	{
        $sql = "SELECT *
                FROM type 
                ORDER BY name";
        
        // On se connecte à la BDD grâce à la méthode statique du model parent
		$pdo = self::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);
        
		// On récupère tous les résultats avec "fetchAll" et on met transmet les données récupérées à une instance du model courant (Pokemon)
		$pokemons = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		// On ferme la connexion
		unset($pdo); 

		return $pokemons;
    }
}