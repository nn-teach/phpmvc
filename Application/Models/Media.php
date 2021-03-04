<?php

namespace Application\Models;

class Media extends Post
{

    function __construct($values) {
        $this->title = isset($values['post_title']) ? $values['post_title'] : null;
        $this->content = isset($values['post_content']) ? $values['post_content'] : null;
        $this->author = isset($values['post_author']) ? $values['post_author'] : null;
        $this->date = isset($values['post_date']) ? $values['post_date'] : null;
        $this->name = isset($values['post_name']) ? $values['post_name'] : null;
    }

    //Getter & Setters différent?
    //Par exemple, ici on va utiliser le post_name comme nom de fichier
    function url() {
        return BASE_URL."public/images/".$this->name;
    }

}
