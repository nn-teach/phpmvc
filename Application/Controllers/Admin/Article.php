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
    function index($messages = null)
    {
        $article_repository = new \Application\Models\ArticleRepository(); //on instancie un repository
        $donnees_articles = $article_repository->all(); //on récupère les données depuis la base de données

        foreach($donnees_articles as $donnees_article) {
            $articles_array[] = new \Application\Models\Article($donnees_article);
        }
        
        $this->view->setVar('articles', $articles_array);
        if($messages) {
            if (
                isset($messages['status']) and $messages['status'] == "success"
                and isset($messages['action']) and isset($messages['id'])
            )
            {
                switch ($messages['action']) {
                    case "create":
                        $this->view->setVar('message', "L'article ".$messages['id']." a bien été ajouté");
                        break;
                    case "delete":
                        $this->view->setVar('message', "L'article ".$messages['id']." a bien été supprimé");
                        break;
                    case "update":
                        $this->view->setVar('message', "L'article ".$messages['id']." a bien été modifié");
                        break;
                    default:
                        $this->view->setVar('message', "L'action a bien été effectuée");
                        break;
                }
            }
        }   
        
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
                isset($_POST['post_title']) and $_POST['post_title'] != ""
                /* and isset($_POST['email']) and $_POST['email'] != "" */
                and isset($_POST['post_content']) and $_POST['post_content'] != ""
            ) {   
                $article = new \Application\Models\Article($_POST);

                $articleRepository = new \Application\Models\ArticleRepository();
                $id_inserted = $articleRepository->create($article);
            }
            else {
                $this->view->setVar('errors', "Une erreur s'est produite");
            }
        }
        
        if($id_inserted == 0) $this->view->setVar('view', 'backend/article/create');
        else {
            /* $this->view->setVar('view', 'backend/article/success'); */
            /* $redirect_url = BASE_URL.'?admin=true&type=article&action=index&status=success&id='.$id_inserted;
             * header("Location: {$redirect_url}");
             * exit; */
            $messages = ['status'=>'success','action'=>'create','id'=>$id_inserted]; 
            $this->index($messages);
        }

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    function delete()
    {

        //$article = new \Application\Models\Article($_POST);
        if(
            isset($_GET['id']) and $_GET['id'] != ""
        ) {
            $id = $_GET['id'];
            //print_r($id);

            $articleRepository = new \Application\Models\ArticleRepository();
            $articleRepository->delete($id);

            $messages = ['status'=>'success','action'=>'delete','id'=>$id]; 
            $this->index($messages);
        }
        else {
            echo "error";
        }
    }

    function update()
    {
        if(
            isset($_GET['id']) and $_GET['id'] != ""
        ) {
            $id = $_GET['id'];
            $articleRepository = new \Application\Models\ArticleRepository();
            $donnees_article = $articleRepository->readId($id);
            // Créer un objet Article et l'hydrater avec les données récupérées précédemment
            $article = new \Application\Models\Article( $donnees_article );
            // Passer l'objet Article à la vue
            $this->view->setVar('article', $article);
        }
        
        $id_inserted = 0;

        if (!empty($_POST)) {
            if(
                isset($_POST['post_title']) and $_POST['post_title'] != ""
                /* and isset($_POST['email']) and $_POST['email'] != "" */
                and isset($_POST['post_content']) and $_POST['post_content'] != ""
            ) {   
                $article = new \Application\Models\Article($_POST);

                $articleRepository = new \Application\Models\ArticleRepository();
                $articleRepository->update($article);
                $id_inserted = $article->id();
            }
            else {
                $this->view->setVar('errors', "Une erreur s'est produite");
            }
        }
        
        if($id_inserted == 0) $this->view->setVar('view', 'backend/article/create');
        else {
            /* $this->view->setVar('view', 'backend/article/success'); */
            /* $redirect_url = BASE_URL.'?admin=true&type=article&action=index&status=success&id='.$id_inserted;
             * header("Location: {$redirect_url}");
             * exit; */
            $messages = ['status'=>'success','action'=>'update','id'=>$id_inserted]; 
            $this->index($messages);
        }

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }
}
