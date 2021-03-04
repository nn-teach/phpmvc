<?php

namespace Application\Controllers\Admin;

Class Contact {

    public $view;

    function __construct() {
        $this->view = new \Application\Views\View();
    }

    /**
     * Affiche la page d'accueil
     */
    function index()
    {
        
        $contact_repository = new \Application\Models\ContactRepository(); //on instancie un repository
        $donnees_contacts = $contact_repository->all(); //on récupère les données depuis la base de données

        foreach($donnees_contacts as $donnees_contact) {
            $contacts_array[] = new \Application\Models\Contact($donnees_contact);
        }
        
        $this->view->setVar('contacts', $contacts_array);
        
        //On donne le nom de la vue que l'on veut appeler
        $this->view->setVar('view', 'backend/contact/index');

        
        //on appelle la template, qui va utiliser la view que l'on a choisie
        //La fonction render utilise template.php par défaut, mais on peut lui spécifier une autre template en paramètre
        echo $this->view->render();

    }
    function create() {
        echo "Je suis dans mon controller contact";
        echo " et je suis dans la méthode create";
    }

    function edit() {
        echo "Je suis dans mon controller contact";
        echo " et je suis dans la méthode edit";
        echo "j'édite le contact numéro: ".$_GET['id'];
    }

}
