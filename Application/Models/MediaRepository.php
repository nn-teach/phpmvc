<?php

namespace Application\Models;

require_once("Repository.php");

class MediaRepository extends Repository
{
    function create() {

    }

    function read($name) {
        $statement = $this->db->prepare('SELECT * FROM posts WHERE post_type="media" AND post_name="' . $name . '"');

        try {

            $statement->execute();
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }

        return $statement->fetch();
    }

    function linkWithPost($post_id) {

        $statement = $this->db->prepare('SELECT p1.* FROM posts AS p1 JOIN posts_posts AS pp ON p1.id = pp.post_id2 JOIN posts AS p2 ON p2.id = pp.post_id1 WHERE p2.id = '. $post_id . ' AND p1.post_type="media"');

        try {

            $statement->execute();
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }
        
        return $statement->fetch();
    }

    function update() {

    }

    function delete() {

    }

    function all() {
        
    }
}
