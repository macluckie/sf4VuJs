<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;


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
      
        return $this->json([
            'article' => $article,

        ]);
    }


    /**
     * HEAD Route annotation.
     * @Get("/articleId/")
     */
    public function getIdarticle()
    {
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
     * @Get("/access")
     */
    public function checkToken()
    {
        return $this->json(['res' => 'ok']);
    }


    /**
     * HEAD Route annotation.
     * @Post("/edit_article")
     */
    public function postArticle(Request $request)
    {
        if ($request->isMethod('post')) {
            $em = $this->getDoctrine()->getManager();
            $article =  $em->getRepository(Article::class)->find($request->request->get('id'));
            $content = $request->request->get('content');
            $title = $request->request->get('titre');
            $author = $request->request->get('auteur');
            $article->setAuteur($author);
            $article->setContenue($content);
            $article->setTitle($title);
            $em->persist($article);
            $em->flush();
            return $this->json(['res' => 'ok']);
        }
    }
}
