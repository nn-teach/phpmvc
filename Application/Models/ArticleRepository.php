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

    function readId($id)
    {
        $statement = $this->db->prepare('SELECT * FROM posts WHERE post_type="article" AND id="' . $id . '"');

        try {

            $statement->execute();
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }

        return $statement->fetch();
    }

    function update($articleObject)
    {
        /* var_dump($articleObject);die; */
        /* print_r('UPDATE posts SET post_title=:title, post_name=:name, post_content=:content, post_author=:author, post_status=:status, post_category=:category, post_date=CURRENT_DATE, post_type="article" WHERE id="'. $articleObject->id() . '"');die; */
        $query = $this->db->prepare(
            'UPDATE posts SET post_title=:title, post_name=:name, post_content=:content, post_author=:author, post_status=:status, post_category=:category, post_date=CURRENT_DATE, post_type="article" WHERE id="'. $articleObject->id() . '"');

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

    function all($category = null,$status = null)
    {
        $query = 'SELECT * FROM posts WHERE post_type="article"';
        if ($category != null) $query .= ' AND  post_category="'.$category.'"';
        if ($status != null) $query .= ' AND  post_status="'.$status.'"';
        
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

        // \PDO::FETCH_ASSOC demande un r??sultat sous forme de tableau associatif
        return $statement->fetchAll(\PDO::FETCH_ASSOC); 
    }
}
