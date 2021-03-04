<?php

namespace Application\Models;

class Newsletter
{
    private $email;

    function __construct($values) {
        $this->email = isset($values['email']) ? $values['email'] : null;
    }

    function email() {
      return $this->email;
    }

    function setEmail($email) {
      return $this->email = $email;
    }

}
