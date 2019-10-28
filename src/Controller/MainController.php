<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function homepage(Request $request): Response
    {
        return $this->render('main/homepage.html.twig');
    }
}
