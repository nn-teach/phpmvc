<?php

namespace Application\Models;

require_once("Repository.php");

class ArticleRepository extends Repository
{
  function create()
  {
  }

  function read($name)
  {
    $statement = $this->db->prepare('SELECT * FROM posts WHERE post_type="article" AND post_name="' . $name . '"');

    try {

      $statement->execute();
    } catch (\PDOException $e) {
      echo "Statement failed: " . $e->getMessage();
      return false;
    }

    return $statement->fetch();
  }

  function update()
  {
  }

  function delete()
  {
  }

  function all($categories = array())
  {
  }
}
