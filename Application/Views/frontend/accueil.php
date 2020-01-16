

<div class="row medium-8 large-7 columns">

    <h2>Titre: <?php echo $this->data['page']->title(); ?></h2>

    <h4>Contenu: </h4>

    <?php echo $this->data['page']->content(); ?>

    <hr>

    <h3>On est sur la view "accueil".php</h3>

</div>
    
    
<div class="row medium-8 large-7 columns">

    <h3>La liste d'articles devraient apparaitre en dessous sous cette forme : </h3>

    <hr>

    <?php include 'article-accueil.php'; ?>

    <?php include 'article-accueil.php'; ?>

    <?php
    //Pour récupérer les variables passées dans le contrôleur: 
    // print_r($this->data['posts']);
    ?>

</div>
