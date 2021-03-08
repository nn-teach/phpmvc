<?php

namespace Application\Models;

require_once("Repository.php");

class ArticleRepository extends Repository
{
    function create($articleObject)
    {
        $query = $this->db->prepare(
            'INSERT INTO posts (post_title, post_name, post_content, post_author, post_status, post_category, post_date, post_type) VALUES (:title, :name, :content, :author, :status, :category, CURRENT_DATE, "article")'
        );
        $query->bindValue(':title', $articleObject->title());
        $name = str_replace(' ', '-', $articleObject->title());
        $query->bindValue(':name', $name);
        $query->bindValue(':content', $articleObject->content());
        $query->bindValue(':author', $articleObject->author()->id());
        $query->bindValue(':status', $articleObject->status());
        $query->bindValue(':category', $articleObject->category());

        
        try {
            $query->execute();
        } catch (\Throwable $e) {
            echo "Query failed: " . $e->getMessage();
            return false;
        }
        
        return $this->db->lastInsertId();
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

    
    function delete($id)
    {
        $query = 'DELETE FROM posts WHERE id="' . $id . '"';

        $statement = $this->db->prepare($query);

        try {

            $statement->execute();
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }

    }

    function all($category = null)
    {
        $query = 'SELECT * FROM posts WHERE post_type="article"';
        if ($category != null) $query .= ' AND  post_category="'.$category.'"';
        
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
}
