<?php

namespace Blog\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogFrontBundle:Default:index.html.twig', array("title" => "Accueil Blog","content" => "Bienvenue sur notre blog"));
    }
}
