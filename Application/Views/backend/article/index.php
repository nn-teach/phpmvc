<?php
include dirname(__DIR__).'/message.php'; 
?>

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
         echo "<td>";
         echo '<a href="?admin=true&type=article&action=delete&id='.$article->id().'">';
         echo "DELETE";
         echo "</a>";
         echo "</td>";
         echo "</tr>";
         
     }

     ?>

    </tbody>
     </table>

</div>
