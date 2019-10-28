<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends AbstractController
{

    public function getLastNews(int $count = 2): Response
    {
        $newsList = [
            ['id' => 1, 'title' => 'Once upon a time'],
            ['id' => 2, 'title' => 'Yesterday in Paris'],
            ['id' => 3, 'title' => 'Last kiss'],
            ['id' => 4, 'title' => 'My dogs are so handsome'],
        ];

        return $this->render('news/_get_last_news.html.twig', [
            'news_list' => array_slice($newsList, 0, $count),
        ]);
    }
}
