
<div class="callout primary">
  <div class="row column text-center">
    <h2 class="subheader">Nouvel Article</h2>
    <form action="?admin=true&type=article&action=create" method="post">
      <input type="text" name="post_title" value="" placeholder="Titre">
      <input type="text" name="post_category" value="" placeholder="Category">
      <textarea cols="30" id="content" value="" name="post_content" rows="10">Ici le contenu de votre article</textarea>
      <label for="status-select">Status:</label>
      <select name="post_status" id="status-select">
        <option value="">--Choisir une option--</option>
        <option value="draft">Brouillon</option>
        <option value="published">Publié</option>
        <option value="trash">Poubelle</option>
      </select>
      <input type="submit" value="Envoyer">
    </form>
    </div>
</div>
