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
        $this->id = isset($values['id']) ? $values['id'] : null;

        $this->name = isset($values['contact_name']) ? $values['contact_name'] : null;
        $this->email = isset($values['contact_email']) ? $values['contact_email'] : null;
        $this->message = isset($values['contact_message']) ? $values['contact_message'] : null;
        $this->date = isset($values['contact_date']) ? $values['contact_date'] : null;
    }

    function id() {
        return $this->id;
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

    function date() {
        /* return $this->date; */
        return date("d F Y à H:i", strtotime($this->date));
    }
    
    function setEmail($email) {
        return $this->email = $email;
    }

}
