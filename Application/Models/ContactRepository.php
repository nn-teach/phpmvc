<?php

namespace Application\Models;

// require_once("Repository.php");

class ContactRepository extends Repository
{
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
