<?php

namespace App\Tests;
use PHPUnit\Framework\TestCase;
use App\Controller\ArticleController;
use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

class ArticleControllerTest extends TestCase
{
    public function testGetArticlesAction()
    {
        // $em = $this->createMock(EntityManagerInterface::class);
        // $controller = new ArticleController($em); 
        // $article = new Article();
        // $repo_article = $this->createMock(ObjectRepository::class);
        // $repo_article->expects($this->any())
        //              ->method('findall')
        //              ->willReturn($article);
        // $em->expects($this->any())
        //     ->method('getRepository')
        //     ->willReturn($repo_article);
            
        //     $this->assertJsonStringEqualsJsonString(
        //         json_encode(['articles' => $article]),
        //         $controller->getArticlesAction()->getContent()
        //     );    


        
        

        


        // $this->assertJsonStringEqualsJsonString(
        //     json_encode(['user' => 'plop', 'roles'=> 'USER_ROLE' ]),
        //     $controller->plop()->getContent()
        // );     
    }
}
