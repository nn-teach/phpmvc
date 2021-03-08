<?php

namespace Application\Controllers;

use Application\Models\NewsletterRepository;

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
        /***********************************************/
        //À compléter
        //On doit récupérer les articles depuis la base de données et les initialiser
        //puis les passer à la view

        $article_repository = new \Application\Models\ArticleRepository(); //on instancie un repository
        $donnees_posts = $article_repository->all(); //on récupère les données depuis la base de données

        $posts_array = array(); 
        foreach($donnees_posts as $donnees_post) {
            $posts_array[] = new \Application\Models\Article($donnees_post);
        } 
        // print_r($posts_array[0]->title());
        // die;
        $this->view->setVar('articles', $posts_array);

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
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }
        $this->view->setVar('category', $category);
        /***********************************************/
        //À compléter
        //On doit récupérer l'article depuis la base de données puis l'initialiser
        //puis le passer à une view
        /***********************************************/
        $article_repository = new \Application\Models\ArticleRepository(); //on instancie un repository
        $donnees_posts = $article_repository->all($category); //on récupère les données depuis la base de données

        $posts_array = array(); 
        foreach($donnees_posts as $donnees_post) {
            $posts_array[] = new \Application\Models\Article($donnees_post);
        } 
        // print_r($posts_array[0]->title());
        // die;
        $this->view->setVar('articles', $posts_array);

        //On donne le nom de la vue que l'on veut appeler
        $this->view->setVar('view', 'frontend/category');


        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Affiche la page d'un article
     * @param String $name : Le nom de l'article à afficher
     */
    function article($name = null) {

        // 2) récupérer l'article qui correspond à $_GET['nom'] (Coder le repository si besoin)
        $article_repository = new \Application\Models\ArticleRepository();
        $donnees_article_accueil = $article_repository->read($_GET['name']);

        // 3) Créer un objet Article et l'hydrater avec les données récupérées précédemment
        $article_accueil = new \Application\Models\Article( $donnees_article_accueil );

        // 4) Passer l'objet Article à la vue
        $this->view->setVar('article', $article_accueil);

        // 5) indiquer à la vue quelle template HTML il faut utiliser
        $this->view->setVar('view', 'frontend/article');

        // 6) vue->render
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
        $id_inserted = 0;

        if (!empty($_POST)) {
            if(
                isset($_POST['contact_name']) and $_POST['contact_name'] != ""
                /* and isset($_POST['email']) and $_POST['email'] != "" */
                and isset($_POST['contact_message']) and $_POST['contact_message'] != ""
            ) {   
                $contact = new \Application\Models\Contact($_POST);

                $contactRepository = new \Application\Models\ContactRepository();
                $id_inserted = $contactRepository->create($contact);
            }
            else {
                $this->view->setVar('errors', "Une erreur s'est produite");
            }
        }

        $this->view->setVar('id_message', $id_inserted);
        
        if($id_inserted == 0) $this->view->setVar('view', 'frontend/contact/index');
        else $this->view->setVar('view', 'frontend/contact/success');

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Traite le formulaire de newsletter
     */
    function newsletter() {

        //Côté Modèles :
        // 1) ajouter une nouvelle entrée au menu qui pointe vers ?action=newsletter
        // 2) coder une nouvelle classe Repository : NewsletterRepository
        // 3) coder une nouvelle classe : Newsletter

        //Côté Contrôleur :
        // 4) si $_POST est vide, on affiche le formulaire
        // 4.2 ) Coder une nouvelle template avec le formulaire (méthode post, il doit pointer vers ?action=newsletter)

        // 5) si $POST n'est pas vide, on sauvegarde dans la base de données :
        // 5.1) on crée un objet Newsletter avec la valeur de $_POST
        // 5.2) on crée un objet NewsletterRepository
        // 5.3) on appelle la fonction create($newsletter) du NewsletterRepository
        // 5.4) la fonction create($newsletter) du NewsletterRepository doit renvoyer dernier #ID créé en base de données
        // 5.5) Si le dernier ID est différent de 0, alors la création s'est bien passée, on peut afficher une template différente avec un message de succès

        $id_inserted = 0;

        if(isset($_POST['email']) and $_POST['email'] != "") {
            $newsletter = new \Application\Models\Newsletter($_POST);

            $newsletterRepository = new NewsletterRepository();
            $id_inserted = $newsletterRepository->create($newsletter);
        }

        if($id_inserted == 0) $this->view->setVar('view', 'frontend/newsletter/index');
        else $this->view->setVar('view', 'frontend/newsletter/success');

        echo $this->view->render();
    }
}
