<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestBundle:Default:index.html.twig');
    }

    public function helloAction() {
        return $this->render('TestBundle:Default:index.html.twig', array("name" =>"Hello toi ! :) <3"));
        //return new Response("Hello toi ! :) <3");
    }

    public function hello2Action($name) {
        return $this->render('TestBundle:Default:index.html.twig', array("name" =>$name));
        //return new Response("Hello ".$name." !");
    }
}
