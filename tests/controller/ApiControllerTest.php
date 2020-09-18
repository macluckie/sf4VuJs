<?php


namespace App\Tests\controller;
use PHPUnit\Framework\TestCase;
use App\Controller\ApiController;



class ApiControllerTest extends TestCase
{
    public function testCheck()
    {
        $apiController = new ApiController();

        $this->assertJsonStringEqualsJsonString(
            json_encode(
                [
                    'user' => 'plop',
                    'roles' => 'USER_ROLE',

                ]
            ),

            $apiController->check()
        );

    }



}