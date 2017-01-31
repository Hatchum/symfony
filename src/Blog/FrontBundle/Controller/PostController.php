<?php
/**
 * Created by PhpStorm.
 * User: arthu
 * Date: 30/01/2017
 * Time: 15:38
 */

namespace Blog\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostController extends Controller
{
    public function viewAction($id) {
        if (!is_numeric($id)) {
            throw $this->createNotFoundException('Page introuvable');
            throw new HttpException(404, 'Page introuvable');
        }
        else
            return $this->render('BlogFrontBundle:Default:post.html.twig', array("content" => "Affichage de l'article n°".$id));
    }
}