<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;


class ArticleController  extends AbstractController

{
    public function getArticlesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository(Article::class)->findAll();
        return $this->json([
            'articles' => $articles,
            
        ]);


    } 
}
