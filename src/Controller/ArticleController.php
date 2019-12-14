<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\VarDumper\VarDumper;

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

    /**
     * HEAD Route annotation.
     * @Get("/article/{id}")
     */
    public function getArticle($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)->find($id);
        $arrayArticle = [];
        foreach ($article as $key => $value) {
            $arrayArticle = 
            [
                'title' =>$article->getTitle(),
                'subltitle' =>$article->getSubTitle(),
                'auteur' => $article->getAuteur(),
                'data' => $article->getDate(),
                'contenue' =>$article->getContenue(),
                'picture' => $article->getPicture()

            ];
        }

        return $this->json([
            'article' => $article,

        ]);
    }
}
