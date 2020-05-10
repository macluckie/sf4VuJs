<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;
use Doctrine\ORM\EntityManagerInterface;



class ArticleController  extends AbstractController
{
    
    
    public function getArticlesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository(Article::class)->findAll();   
        return $this->json([
            'article' => $articles,

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
        // $arrayArticle = [];
        // foreach ($article as $key => $value) {
        //     $arrayArticle = 
        //     [
        //         'title' =>$article->getTitle(),
        //         'subltitle' =>$article->getSubTitle(),
        //         'auteur' => $article->getAuteur(),
        //         'data' => $article->getDate(),
        //         'contenue' =>$article->getContenue(),
        //         'picture' => $article->getPicture()

        //     ];
        // }
        return $this->json([
            'article' => $article,

        ]);
    }


    /**
     * HEAD Route annotation.
     * @Get("/articleId/")
     */
    public function getIdarticle(){
        $em = $this->getDoctrine()->getManager();
        $minId = $em->getRepository(Article::class)->getMinId();
        $maxId = $em->getRepository(Article::class)->getMaxId();
        return $this->json([
            'minId' => $minId[0]->getId(),
            'maxId' => $maxId[0]->getId()

        ]);        
    }


     /**
     * HEAD Route annotation.
     * @Get("/check/")
     */
    public function checkToken()
    {
        return $this->json(['res'=>'ok']);
    }


}
