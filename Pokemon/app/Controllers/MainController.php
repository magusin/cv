<?php

namespace Pokedex\Controllers;


class MainController extends CoreController {

    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        // On require le fichier views/main/home.tpl.php
        $this->show('homepage', [
            'title' => "Accueil"
        ]);
    }

        /**
     * Méthode s'occupant de la page list
     *
     * @return void
     */
    public function list()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        // On require le fichier views/main/home.tpl.php
        $this->show('list', [
            'title' => "List"
        ]);
    }

            /**
     * Méthode s'occupant de la page list
     *
     * @return void
     */
    public function types()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        // On require le fichier views/main/home.tpl.php
        $this->show('types', [
            'title' => "Types"
        ]);
    }

}