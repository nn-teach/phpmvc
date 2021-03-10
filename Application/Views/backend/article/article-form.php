<?php
// var_dump($this->data['article']);die('Article-form.php');
$action = "create";
$article = null;
if (isset($this->data['article']) && $this->data['article'] != "") {
    $article = $this->data['article'];
    $action = "update";
}
?>

<div class="callout primary">
  <div class="row column text-center">
    <h2 class="subheader">
      <?php if($article) {
          echo "Modifier l'article : ".$article->name();
          echo ' <a href="?admin=true&type=article&action=delete&id='.$article->id().'">';
          echo "DELETE";
          echo "</a>";
      } else {
          echo "Nouvel Article";
      }   
      ?>
    </h2>
    <form action="?admin=true&type=article&action=<?php echo $action ?>" method="post">
      <input type="text" name="post_title" value="<?php echo $article ? $article->title() : "" ?>" placeholder="Titre">
      <input type="text" name="post_category" value="<?php echo $article ? $article->category() : "" ?>" placeholder="Category">
      <textarea cols="30" id="content" value="" name="post_content" rows="10"><?php echo $article ? $article->title() : "Ici le contenu de votre article" ?></textarea>
      <label for="status-select">Status:</label>
      <select name="post_status" id="status-select">
        <option value="">--Choisir une option--</option>
                      <?php
                      foreach(STATUS as $S) {
                          ($article && $article->status() == $S) ? $selected = "selected" : "";                  
                          echo '<option value="'.$S.'" '.$selected.'">'.$S.'</option>"';
                      }
                      ?>
        <!-- <option value="draft" <?php echo ($article && $article->status() == "draft") ? "selected" : "" ?>>Brouillon</option>
             <option value="published" <?php echo ($article && $article->status() == "published") ? "selected" : "" ?>>Publié</option>
             <option value="trash" <?php echo ($article && $article->status() == "trash") ? "selected" : "" ?>>Poubelle</option> -->
      </select>
      <input type="submit" value="Envoyer">
    </form>
    </div>
</div>
