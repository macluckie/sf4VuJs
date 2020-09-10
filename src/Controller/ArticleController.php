<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;




class ArticleController  extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getArticlesAction()
    {
        $articlesArray = [];
        foreach ($this->getArticles() as  $k => $article)
        {
            $articlesArray[] =
                [
                    'id' => $article->getId(),
                    'title' => $article->getTitle(),
                    'subtitle' => $article->getSubtitle(),
                    'auteur' => $article->getAuteur(),
                    'date' => $article->getDate(),
                    'contenue' => $article->getContenue()
                ];

        }
        return new JsonResponse($articlesArray);
    }

    public function getArticles()
    {
        return  $this->em->getRepository(Article::class)->findAll();
    }

    /**
     * HEAD Route annotation.
     * @Get("/article/{id}")
     */
    public function getArticle($id)
    {
        $article = $this->em->getRepository(Article::class)->find($id);
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
        $minId = $this->em->getRepository(Article::class)->getMinId();
        $maxId = $this->em->getRepository(Article::class)->getMaxId();
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
//        return $this->json(['res' => 'ok']);
        return new JsonResponse(['res' => 'ok']);
    }


    /**
     * HEAD Route annotation.
     * @Post("/edit_article")
     */
    public function postArticle(Request $request)
    {
        if ($request->isMethod('post')) {
            $article =  $this->em->getRepository(Article::class)->find($request->request->get('id'));
            $content = $request->request->get('content');
            $title = $request->request->get('titre');
            $author = $request->request->get('auteur');
            $article->setAuteur($author);
            $article->setContenue($content);
            $article->setTitle($title);
            $this->em->persist($article);
            $this->em->flush();
            return $this->json(['res' => 'ok']);
        }
    }
}
