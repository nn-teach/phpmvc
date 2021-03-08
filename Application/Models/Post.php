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

    function _construct() {

    }

    //Getter & Setters

    function id() {
        return $this->id;
    }
    
    function title() {
        return $this->title;
    }

    function content() {
        return $this->content;
    }

    function date() {
        /* return $this->date; */
        return date("d F Y à H:i", strtotime($this->date));
    }

    function name() {
        return $this->name;
    }

    function author() {
        $author_repository = new \Application\Models\AuthorRepository();
        $donnees_author = $author_repository->read($this->author);
        $author = new \Application\Models\Author($donnees_author);
        /* print_r($author);die; */
        return $author;
    }

    function category() {
        return $this->category;
    }

}
