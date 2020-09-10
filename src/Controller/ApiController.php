<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class ApiController extends AbstractController
{
   
/**
 * @Route("/api/check", name="test")
 */
    public function check()
    {
        return json_encode(
            [
                'user' => 'plop',
                'roles' => 'USER_ROLE'
            ]
        );
    }
}
