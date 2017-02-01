<?php

namespace Blog\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('BlogFrontBundle:User')
                    ->getUsers();
        return $this->render('BlogFrontBundle:User:list.html.twig', array(
            'users' => $users
        ));
    }

}
