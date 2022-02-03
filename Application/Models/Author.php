<?php

namespace Application\Models;

class Author
{
    protected $id;
    protected $login;
    
    function __construct($values) {
        $this->id = isset($values['id']) ? $values['id']:null;
        $this->login = isset($values['user_login']) ? $values['user_login']:null;
    }

    //Getter & Setters différent?

    function login(){
        return $this->login;
    }
}
