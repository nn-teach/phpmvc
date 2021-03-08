<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Blog MVC | Welcome</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href="public/style.css" rel="stylesheet"/>
  </head>
  <body>

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
        <li class="menu-text"><a href="<?php echo BASE_URL; ?>">Accueil</a></li>
        <li><a href="<?php echo BASE_URL; ?>?action=articles&category=news">News</a></li>
        <li><a href="<?php echo BASE_URL; ?>?action=articles&category=blog">Blog</a></li>
        <li><a href="<?php echo BASE_URL; ?>?action=contact">Contact</a></li>
        <li><a href="<?php echo BASE_URL; ?>?action=newsletter">Newsletter</a></li>
        <li><a href="<?php echo BASE_URL; ?>?action=page&name=mentions-legales">Mentions légales</a></li>
        </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu">
        <li><a href="<?php echo BASE_URL; ?>?admin=true">Admin</a></li>
        <li><a href="<?php echo BASE_URL; ?>dbadmin">DB Admin</a></li>
        </ul>
    </div>
</div>

<div class="callout large primary">
    <div class="row column text-center">
    <h1>Un Blog</h1>
    <h2 class="subheader">Simple MVC, simple mise en page</h2>
    </div>
</div>

<br/>

<?php

// on cherche la view demandée
if(file_exists('Application/Views/'.$this->data['view'] . '.php')) include $this->data['view'] . '.php';
else include 'frontend/not-found.php';

?>

<br/>
<br/>
<br/>

<?php if(!isset($_GET['action']) or $_GET['action']!= "newsletter") include 'frontend/newsletter/form.php'; ?>

<div class="callout ">
    <div class="row column text-center">
    <h3>2033 © Pierre</h3>
    </div>
</div>


<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>

