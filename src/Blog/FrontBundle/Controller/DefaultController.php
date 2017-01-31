<?php

namespace Blog\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogFrontBundle:Default:index.html.twig', array("content" => "Bienvenue sur notre blog"));
    }

    public function aboutAction()
    {
        return $this->render('BlogFrontBundle:Default:about.html.twig', array("content" => "A Propos : Ce blog présente des articles..."));
    }
}
