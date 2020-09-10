<?php


namespace App\Tests\controller;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Controller\ArticleController;



class ArticleControllerTest extends TestCase
{

    /**
     * @dataProvider dataArticle
     */
    public function testGetArticles($articles,$expected)
    {
        $em = $this->createMock(EntityManagerInterface::class);
        $articleRepository = $this->createMock(ArticleRepository::class);
        $articleRepository->expects($this->any())
            ->method('findAll')
            ->willReturn($articles);
        $em ->method('getRepository')
            ->willReturn($articleRepository);
        $articleController = new ArticleController($em);
        $result = $em->getRepository(Article::class)->findAll();
        $this->assertEquals($expected, $articleController->getArticles());

    }



    public function dataArticle()
    {
        $data = [];
        $article = null;
        for ($i = 1; $i < 10; $i++)
        {
            ${'article'.$i} = new Article();
            ${'article'.$i} ->setId($i);
            ${'article'.$i} ->setTitle("title".$i);
            ${'article'.$i} ->setSubTitle("subTitle".$i);
            ${'article'.$i} ->setAuteur("auteur".$i);
            ${'article'.$i} ->setContenue("contenue".$i);
            ${'article'.$i} ->setPicture("Picture".$i);

            $data =
                [
                   [  ${'article'.$i},   ${'article'.$i}]

                ];
        }
        return $data;

    }


}