<?php

namespace Application\Models;

class Article extends Post
{

    function __construct($values)
    {
        $this->id = isset($values['id']) ? $values['id'] : null;
        $this->title = isset($values['post_title']) ? $values['post_title'] : null;
        $this->content = isset($values['post_content']) ? $values['post_content'] : null;
        $this->author = isset($values['post_author']) ? $values['post_author'] : null;
        $this->date = isset($values['post_date']) ? $values['post_date'] : null;
        $this->name = isset($values['post_name']) ? $values['post_name'] : null;
    }

    //Getter & Setters différent?
    function mainImage() {
        $media_repository = new \Application\Models\MediaRepository();
        $donnees_media = $media_repository->linkWithPost($this->id);
        $media = new \Application\Models\Media($donnees_media);
        return $media;
    }

}
