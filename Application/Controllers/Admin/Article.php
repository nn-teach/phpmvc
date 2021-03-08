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
        $article_repository = new \Application\Models\ArticleRepository(); //on instancie un repository
        $donnees_articles = $article_repository->all(); //on récupère les données depuis la base de données

        foreach($donnees_articles as $donnees_article) {
            $articles_array[] = new \Application\Models\Article($donnees_article);
        }
        
        $this->view->setVar('articles', $articles_array);
        
        //On donne le nom de la vue que l'on veut appeler
        $this->view->setVar('view', 'backend/article/index');

        
        //on appelle la template, qui va utiliser la view que l'on a choisie
        //La fonction render utilise template.php par défaut, mais on peut lui spécifier une autre template en paramètre
        echo $this->view->render();
        
    }
    function create() {

        $id_inserted = 0;

        if (!empty($_POST)) {
            if(
                isset($_POST['title']) and $_POST['title'] != ""
                /* and isset($_POST['email']) and $_POST['email'] != "" */
                and isset($_POST['content']) and $_POST['content'] != ""
            ) {   
                $article = new \Application\Models\Article($_POST);

                $articleRepository = new \Application\Models\ArticleRepository();
                $id_inserted = $articleRepository->create($article);
            }
            else {
                $this->view->setVar('errors', "Une erreur s'est produite");
            }
        }

        $this->view->setVar('id_message', $id_inserted);
        
        if($id_inserted == 0) $this->view->setVar('view', 'backend/article/create');
        else $this->view->setVar('view', 'backend/article/success');

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }


}
