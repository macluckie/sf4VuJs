<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;


class UserController extends AbstractController
{
    /**
     * getUserAction
     * affiche la liste de tous les users
     * 
     */
    public function getUserAction()
    {
        $users = $this->em()->getRepository(User::class)->findAll();
        return $this->json([
            'users' => $users,
        ]);
    }

    /**
     * postUserAction()
     * permet d'ajouter un user depuis un formulaire
     * 
     */
    public function postUserAction(Request $request)
    {
        $this->addUser($request);
        return $this->json([
            'res' => '1'
        ]);
    }
    

    private function addUser($request)
    {
        if ($request->isMethod('post')) {
            $user = new User();
            $user->setUsername($request->request->get('username'));
            $user->setEmail($request->request->get('email'));
            $this->em()->persist($user);
            $this->em()->flush();
        }
    }

    private function em()
    {
        $em = $this->getDoctrine()->getManager();
        return $em;
    }
}
