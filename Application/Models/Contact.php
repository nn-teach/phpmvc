<?php

namespace Application\Models;

class Contact
{
    private $id;
    private $name;
    private $email;
    private $message;
    private $date;

    function __construct($values) {
        $this->name = isset($values['name']) ? $values['name'] : null;
        $this->email = isset($values['email']) ? $values['email'] : null;
        $this->message = isset($values['message']) ? $values['message'] : null;
        $this->date = isset($values['date']) ? $values['date'] : null;
    }

    function name() {
        return $this->name;
    }
    
    function email() {
        return $this->email;
    }

    function message() {
        return $this->message;
    }
    
    function setEmail($email) {
        return $this->email = $email;
    }

}
