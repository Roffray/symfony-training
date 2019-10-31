<?php

namespace App\User;

use App\Entity\User;

class RegistrationHandler
{

    /** @var UserManager */
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function handle(RegistrationData $data): User
    {
        $user = new User();
        $user
            ->setUsername($data->username)
            ->setEmail($data->email)
            ->setPassword($data->password);

        $this->userManager->save($user);

        return $user;
    }
}
