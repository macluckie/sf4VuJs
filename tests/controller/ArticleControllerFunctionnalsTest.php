<?php


namespace App\Tests\controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerFunctionnalsTest extends WebTestCase
{

    /**
     * @dataProvider routeToTest
     */
    public function testGetArticlesAction($route)
    {
        $client = static::createClient();
        $client->request('GET', $route);
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


    public function testApiWithNOLogin()
    {
        $client = static::createClient();
        $client->request('POST', 'api/login_check');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testApiWithLogin()
    {
        $client = static::createClient();
        $client->request('POST',
            'api/login_check',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{"username":"doudou","password":"momo"}'
        );
//        dd( $client->getResponse()->getStatusCode());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }



    public function dataArticle()
    {
        $data = [];
        for ($i = 1; $i < 10; $i++) {
            $data[] = [$i];
        }
        return $data;
    }

    public function routeToTest()
    {
        $data = [
            ['/articles'],
            ['/articleId/'],

        ];
        return $data ;

    }

}
