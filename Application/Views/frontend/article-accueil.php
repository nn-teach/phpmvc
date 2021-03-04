<div class="blog-post">
  <a href="?action=article&name=<?php echo $article->name(); ?>"><h3><?= $article->title() ?> <small>le <?php echo $article->date();?></small></h3></a>
  <img class="thumbnail" src="<?php echo $article->mainImage()->url(); ?>"style="width: 100%;">
  <p><?= $article->content() ?></p>
  <div class="callout">
    <ul class="menu simple">
      <li><a href="<?php echo BASE_URL."?action=author&name=".$article->author()->login(); ?>">Auteur: <?= $article->author()->login(); ?></a></li>
    </ul>
  </div>
</div>
