<?php

namespace Application\Controllers;

Class Frontend {

    public $view;

    function __construct() {
        $this->view = new \Application\Views\View();
    }

    /**
     * Affiche la page d'accueil
     */
    function index()
    {
        //Exemple de récupération d'une page en base de données
        $page_repository = new \Application\Models\PageRepository(); //on instancie un repository
        $donnees_page_accueil = $page_repository->read('accueil'); //on récupère les données depuis la base de données

        $page_accueil = new \Application\Models\Page( $donnees_page_accueil ); //on instancie un objet page (Un modèle) avec les données récupérées par le repository

        //On passe notre objet à la vue. Dans la fichier de la vue, on pourra utiliser la variable $page
        $this->view->setVar('page', $page_accueil);


        //Autre exemple pour passer des données à la View
        //Exemple de récupération de tous les articles en base de données
        $article_repository = new \Application\Models\ArticleRepository(); //on instancie un repository
        $donnees_articles = $article_repository->all(); //on récupère les données depuis la base de données
        // print_r($donnees_articles);die;

        $articles = [];
        foreach ($donnees_articles as $donnee_dun_article) {
          $articles[] = new \Application\Models\Article($donnee_dun_article);
        }

        $this->view->setVar('articles', $articles); // -> dans ma vue, ce sera dispnible à $this->data['articles']

        //On donne le nom de la vue que l'on veut appeler
        $this->view->setVar('view', 'frontend/accueil');

        
        //on appelle la template, qui va utiliser la view que l'on a choisie
        //La fonction render utilise template.php par défaut, mais on peut lui spécifier une autre template en paramètre
        echo $this->view->render();
    
    }

    /**
     * Affiche une page
     * @param String $name: l'url de la page (colonne)
     */
    function page($name = "accueil")
    {
      if(isset($_GET['name']) and $_GET['name'] != "") $name = $_GET['name'];

        $page = new \Application\Models\Page([]);

        $this->view->setVar('page', $page);
        $this->view->setVar('view', 'frontend/'.$name);

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Affiche la page des articles
     * @param String $category : Permet de trier les articles par catégorie
     */
    function articles($category = null) {

        /***********************************************/
        //À compléter
        //On doit récupérer les articles depuis la base de données et les initialiser
        //puis les passer à une view
        /***********************************************/


        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Affiche la page d'un article
     * @param String $name : Le nom de l'article à afficher
     */
    function article($name = null) {

        /***********************************************/
        //À compléter
        //On doit récupérer l'article depuis la base de données puis l'initialiser
        //puis le passer à une view
        /***********************************************/


        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Affiche et traite le formulaire de contact
     */
    function contact() {

        /***********************************************/
        //À compléter
        //On doit appeler le formulaire s'il n'y a pas de $_POST
        //S'il y a du $_POST, on doit le vérifier, l'enregistrer en base de données puis afficher un message
        /***********************************************/

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Traite le formulaire de newsletter
     */
    function newsletter() {

        /***********************************************/
        /***********************************************/

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }
}
