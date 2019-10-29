<?php

namespace App\Contact;

use Symfony\Component\Validator\Constraints as Assert;

class ContactData
{

    /**
     * @Assert\NotBlank()
     */
    public $firstName;

    /**
     * @Assert\NotBlank()
     */
    public $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="5")
     */
    public $message;
}
