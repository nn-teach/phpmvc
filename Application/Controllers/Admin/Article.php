<?php

namespace Application\Controllers\Admin;

Class Article {

    public $view;

    function __construct() {
        $this->view = new \Application\Views\View();
    }

    /**
     * Affiche la page d'accueil
     */
    function index()
    {
        
        //On donne le nom de la vue que l'on veut appeler
        /* $this->view->setVar('view', 'frontend/accueil');

         * 
         * //on appelle la template, qui va utiliser la view que l'on a choisie
         * //La fonction render utilise template.php par défaut, mais on peut lui spécifier une autre template en paramètre
         * echo $this->view->render(); */
        echo "Je suis dans mon controller article";
        
    }
    function create() {
        echo "Je suis dans mon controller article";
        echo " et je suis dans la méthode create";
    }


}
