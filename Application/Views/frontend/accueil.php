

<div class="row medium-8 large-7 columns">

    <h2>Titre: <?php echo $this->data['page']->title(); ?></h2>

    <h4>Contenu: </h4>

    <?php echo $this->data['page']->content(); ?>

    <hr>

    <h3>On est sur la view "accueil".php</h3>

</div>
    
    
<div class="row medium-8 large-7 columns">

    <h3>La liste d'articles devraient apparaitre en dessous : </h3>

    <hr>

    <?php
    
    //On a réalisé une boucle sur les informations récupérées depuis la base de données (à chaque tour de boucle on inclut une fois le fichier article-accueil.php)

    //Pour récupérer les variables passées dans le contrôleur, et donc les données recupérées depuis la BDD, on utilisera $this->data['posts']
    foreach($this->data['articles'] as $article) {
      // echo $article->title()."<br>";
      // //il faudra modifier le fichier article-acceuil.php pour qu'il utilise les données de la BDD et pas du HTML brut
      include 'article-accueil.php'; 
    }



    ?>

</div>
