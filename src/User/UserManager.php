<?php

namespace App\User;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserManager
{

    /** @var \Doctrine\Common\Persistence\ObjectManager */
    private $entityManager;

    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
