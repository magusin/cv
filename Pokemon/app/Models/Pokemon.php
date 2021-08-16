<?php

namespace Pokedex\Models;

use \PDO;
use \PDOException;
use Pokedex\Models\Type;

class Pokemon extends CoreModel {

    /** 
     * Propriétés stockant les informations du pokémon
     */
    private $nom;
    private $pv;
    private $attaque;
    private $defense;
    private $attaque_spe;
    private $defense_spe;
    private $vitesse;
    private $numero;

    /**
     * Création de getters  (pas besoin de setters pour notre utilisation !
     * afin de récupérer les valeurs des propriétés
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    public function getPv()
    {
        return $this->pv;
    }

    public function getAttaque()
    {
        return $this->attaque;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getAttaqueSpe()
    {
        return $this->attaque_spe;
    }

    public function getDefenseSpe()
    {
        return $this->defense_spe;
    }
    
    public function getVitesse()
    {
        return $this->vitesse;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    /** 
     * Méthode statique permettant de récupérer la liste des pokémon classés par numéros
     */
    static public function findAll()
	{
        $sql = "SELECT *
                FROM pokemon 
                ORDER BY numero";
        
        // On se connecte à la BDD grâce à la méthode statique du model parent
		$pdo = self::getPDO();

        // On exécute la requête
        $request = $pdo->query($sql);
        
		// On récupère tous les résultats avec "fetchAll" et on met transmet les données récupérées à une instance du model courant (Pokemon)
		$pokemons = $request->fetchAll(PDO::FETCH_CLASS, self::class);

		// On ferme la connexion
		unset($pdo); 

		return $pokemons;
    }

    /** 
     * Méthode statique permettant de récupérer les informations d'un pokémon
     */
    static public function find($numero) {
        $sql = "SELECT *
                FROM pokemon 
                WHERE numero = :numero
                LIMIT 1";

         // On se connecte à la BDD grâce à la méthode statique du model parent
        $pdo = self::getPDO();
        
        // On prépare la requête car elle contient un ou plusieurs paramètres dynamiques.
        $request = $pdo->prepare($sql);

        // On exécute la requête en remplaçant les paramètres dynamiques par leurs vraies valeurs (ici le numéro)
        $request->execute([':numero' => $numero]);

        // On récupère le résultat  et on instancie la classe courante avec les infos récupérées
        $request->setFetchMode(PDO::FETCH_CLASS, self::class);
        $pokemon = $request->fetch();

        return $pokemon;
    }

    /** 
     * Méthode statique permettant de récupérer une liste de pokémons par type
     */
    static public function findByType($typeId)
	{
        // On joint la table de pivot "pokemon_type" afin de pouvoir filtrer sur les ID de type
        $sql = "SELECT *
                FROM pokemon 
                INNER JOIN pokemon_type ON pokemon_type.pokemon_numero = pokemon.numero
                WHERE pokemon_type.type_id = :typeid
                ORDER BY pokemon.numero";
        
        // On se connecte à la BDD grâce à la méthode statique du model parent
		$pdo = self::getPDO();

        
        // On prépare la requête car elle contient un ou plusieurs paramètres dynamiques.
        $request = $pdo->prepare($sql);

        // On exécute la requête en remplaçant les paramètres dynamiques par leurs vraies valeurs (ici le numéro)
        // Comme on récupère le pokémon courant, on utilise $this pour y faire référence
        $request->execute([':typeid' => $typeId]);

        
		// On récupère tous les résultats avec "fetchAll" et on met transmet les données récupérées à une instance du model courant (Pokemon)
		$pokemons = $request->fetchAll(PDO::FETCH_CLASS, self::class);

		// On ferme la connexion
		unset($pdo); 

		return $pokemons;
    }


    /**
     * Méthode permettant de récupérer les types du Pokémon courant
     */
    public function getTypes() {
        // On cherche dans la table de pivot "pokemon_type" les entrées qui correspondent au numéro fourni
        // puis on joint cette table à la table "type" dont on récupère les champs
        $sql = "SELECT type.*
                FROM pokemon_type
                INNER JOIN type ON type.id = pokemon_type.type_id
                WHERE pokemon_type.pokemon_numero = :numero";

        // On se connecte à la BDD grâce à la méthode statique du model parent
        $pdo = self::getPDO();
        
        // On prépare la requête car elle contient un ou plusieurs paramètres dynamiques.
        $request = $pdo->prepare($sql);

        // On exécute la requête en remplaçant les paramètres dynamiques par leurs vraies valeurs (ici le numéro)
        // Comme on récupère le pokémon courant, on utilise $this pour y faire référence
        $request->execute([':numero' => $this->getNumero()]);

        // On récupère le résultat  et on instancie la classe Type avec les infos récupérées
        $types = $request->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $types;
        

    }
}
