<?php

namespace Pokedex\Models;

use \PDO;
use \PDOException;

class CoreModel {
    /** 
     * Propriétés stockant les infos de la BDD (à modifier selon votre configuration !)
     */
    static $dsn = 'mysql:dbname=pokedex;host=localhost;charset=utf8';
    static $user = 'explorateur';
    static $password = 'Ereul9Aeng';

    /**
     * Méthode statique permettant d'instancier une connexion à la BDD via PDO
     */
    static public function getPDO()
    {
        try {
            $pdo = new PDO(
                self::$dsn, 
                self::$user, 
                self::$password,
                array(
                    // Ce mode permet d'afficher les erreurs, c'est plus utile pour le débug !
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
        } catch (PDOException $exception) {
            echo 'La connexion a échoué : ' . $exception->getMessage();
        }

        return $pdo;
    }
}