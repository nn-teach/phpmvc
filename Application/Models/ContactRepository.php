<?php

namespace Application\Models;

// require_once("Repository.php");

class ContactRepository extends Repository
{
    
    function all($category = null)
    {
        $query = 'SELECT * FROM contact';
        
        $statement = $this->db->prepare($query);
        /* $statement = $this->db->prepare('SELECT * FROM posts WHERE post_type="article"'); */

        try {

            $statement->execute();
            
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }
        // var_dump($statement->fetchAll(\PDO::FETCH_ASSOC));
        // die;

        // \PDO::FETCH_ASSOC demande un résultat sous forme de tableau associatif
        return $statement->fetchAll(\PDO::FETCH_ASSOC); 
    }
    
    function create($contactObject)
    {
        
        $query = $this->db->prepare(
            'INSERT INTO contact (contact_name, contact_email, contact_message, contact_date) VALUES (:name, :email, :message, CURRENT_DATE)'
        );
        $query->bindValue(':name', $contactObject->name());
        $query->bindValue(':email', $contactObject->email());
        $query->bindValue(':message', $contactObject->message());

        
        try {
            $query->execute();
        } catch (\Throwable $e) {
            echo "$query failed: " . $e->getMessage();
            return false;
        }
        
        return $this->db->lastInsertId();
    }
    
}
