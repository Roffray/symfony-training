<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends AbstractController
{

    /**
     * @Cache(smaxage=10)
     */
    public function getLastNews(int $count = 2): Response
    {
        $newsList = [
            ['id' => 1, 'title' => 'Once upon a time'],
            ['id' => 2, 'title' => 'Yesterday in Paris'],
            ['id' => 3, 'title' => 'Last kiss'],
            ['id' => 4, 'title' => 'My dogs are so handsome'],
        ];

        shuffle($newsList);

        return $this->render('news/_get_last_news.html.twig', [
            'news_list' => array_slice($newsList, 0, $count),
        ]);
    }
}
