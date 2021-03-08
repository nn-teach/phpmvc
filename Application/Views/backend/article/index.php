<?php
if (isset($this->data['id_article'])) {
?>
  <div class="callout primary">
  <div class="row column text-center">
    <p class="success">L'article <?php echo $this->data['id_article'] ?> a bien été ajouté<br/>
    </p>
    
  </div>
  </div>
<?php } ?>

<div class="row medium-8 large-7 columns">

  <h3>On est sur la view Admin - Article - Index</h3>

</div>


<div class="row medium-8 large-7 columns">

  <h3>Voici la liste des articles</h3>
  <a href="?admin=true&type=article&action=create">Créer un nouvel article</a>

  <hr>
  
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>titre</th>
        <th>auteur</th>
        <th>categorie</th>     
        <th>date</th>
        <th>actions</th>
      </tr>
    </thead>
    <tbody>

     <?php

     foreach($this->data['articles'] as $article)
     {
         echo "<tr>";
         echo "<td>";
         echo '<a href="?admin=true&type=article&action=edit&id='.$article->id().'">';
         echo $article->id();
         echo "</a>";
         echo "</td>";
         echo "<td>";
         echo $article->name();
         echo "</td>";
         echo "<td>";
         echo $article->title();
         echo "</td>";
         echo "<td>";
         echo $article->author()->login();
         echo "</td>";
         echo "<td>";
         echo $article->category();
         echo "</td>";
         echo "<td>";
         echo $article->date();
         echo "</td>";
         echo "</tr>";
     }

     ?>

    </tbody>
  </table>

</div>
