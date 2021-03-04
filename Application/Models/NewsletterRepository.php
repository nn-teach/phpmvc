<?php

namespace Application\Models;

// require_once("Repository.php");

class NewsletterRepository extends Repository
{
  function create($emailObject)
  {
    try {
      
      $sql = "INSERT INTO newsletter (newsletter_email) VALUES (:email)";
      $this->db->prepare($sql)->execute(['email' => $emailObject->email()]);

    } catch (\PDOException $e) {
        echo "Statement failed: " . $e->getMessage();
        return false;
    }

    return $this->db->lastInsertId();
  }
  
}