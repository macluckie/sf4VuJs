<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class ApiController extends AbstractController
{
   
/**
 * @Route("/test", name="test")
 */
    public function index()
    {

        return $this->json(
            [
                'user' => 'plop',
                'roles' => 'USER_ROLE'
            ]
        );
    }
}
