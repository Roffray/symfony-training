<?php

namespace App\User;

use Symfony\Component\Validator\Constraints as Assert;

class RegistrationData
{

    /**
     * @Assert\NotBlank()
     */
    public $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=4)
     */
    public $password;
}
