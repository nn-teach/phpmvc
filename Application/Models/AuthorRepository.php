<?php

namespace Application\Models;

require_once("Repository.php");

class AuthorRepository extends Repository
{
  /**
   * Crée une page dans la base de données
   */
  function create()
  {
  }

  /**
   * Récupère une page dans la base de données
   */
  function read($id)
  {
    $statement = $this->db->prepare('SELECT * from users WHERE id="'.$id.'"');
    
    try {

      $statement->execute();
    
    } catch (\PDOException $e) {
      echo "Statement failed: " . $e->getMessage();
      return false;
    }

    return $statement->fetch();
  }

  /**
   * Met une page à jour dans la base de données
   */
  function update($name)
  {
  }

  /**
   * Efface une page de la base de données
   */
  function delete($name)
  {
  }

  /**
   * Récupère une liste de pages depuis la base de données
   * @param $categories la catégorie à séléctionner
   */
  function all($categories = array())
  {
  }
}
