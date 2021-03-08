
<div class="callout primary">
  <div class="row column text-center">
    <h2 class="subheader">Nouvel Article</h2>
    <form action="?action=article" method="post">
      <input type="text" name="title" placeholder="Titre">
      <input type="text" name="category" placeholder="Category">
      <textarea cols="30" id="content" name="content" rows="10">Ici le contenu de votre article</textarea>
      <label for="status-select">Status:</label>
      <select name="status" id="status-select">
        <option value="">--Choisir une option--</option>
        <option valeur="draft">Brouillon</option>
        <option valeur="published">Publié</option>
        <option valeur="trash">Poubelle</option>
      </select>
      <input type="submit" value="Envoyer">
    </form>
    </div>
</div>
