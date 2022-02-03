<?php

namespace Application\Models;

abstract class Post
{
    protected $id;
    protected $author;
    protected $date;
    protected $content;
    protected $title;
    protected $status;
    protected $name;
    protected $category;

    // function __construct($values) {
    //     $this->title = isset($values['post_title']) ? $values['post_title']:null;
    //     $this->content = isset($values['post_content']) ? $values['post_content']:null;     
    // }
    function __construct($values)
    {
        if (!empty($values)) {
            $translated_values = Post::translateArrayPost($values);
            $this->hydrate($translated_values);
        }
    }

    static function translateArrayPost($post_array)
    {
        // $values <- ['post_title' => 'titi', etc]
        // $values <- ['title' => 'titi', etc]
        $translated_array = array();
        foreach ($post_array as $key => $value) {
            $new_key = str_replace("post_", "", $key);
            $translated_array[$new_key] = $value;
        }
        return $translated_array;
    }

    // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            //$this->setName($donnees['name']);
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key); // ucfirst important! Par exemple, le setter correspondant à nom est setNom.

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    //Getter & Setters
    
    function title() {
        return $this->title;
    }

    function author(){
        $author_repository = new \Application\Models\AuthorRepository();
        $donnees_author = $author_repository->read($this->author);
        $author = new \Application\Models\Author($donnees_author);
        return $author;
    }

    function content() {
        return $this->content;
    }

    function status()
    {
        return $this->status;
    }

    function name()
    {
        return $this->name;
    }

    function category()
    {
        return $this->category;
    }
    function date()
    {
        return date("d F Y à H:i", strtotime($this->date));
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCategory($category) {
        $this->category = $category;
    }
}
