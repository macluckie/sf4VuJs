<?php


namespace App\Tests\controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ArticleControllerFunctionnalsTest extends WebTestCase
{
    public function testGetArticlesAction()
    {
        $client = static::createClient();
        $client->request('GET', '/articles');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    /**
     * @dataProvider dataArticle
     */
    public function testGetOneArticlesAction($id)
    {
        $client = static::createClient();
        $client->request('GET', '/article/'.$id);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    public function dataArticle()
    {
        $data = [];
        for ($i = 1; $i < 10; $i++)
        {          
            $data[] = [$i];
        }

        return $data;

    }

}