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
        else {
            $post = $this->getDoctrine()->getManager()
                        ->getRepository('BlogFrontBundle:Post')
                        ->findOneBy(array('id'=>$id));
            $comments = $this->getDoctrine()->getManager()
                            ->getRepository('BlogFrontBundle:Comment')
                            ->findBy(array('posts'=>$id));
            return $this->render('BlogFrontBundle:Default:post.html.twig',
                                array("content" => "Affichage de l'article n°" . $id, "article" => $post, "comments" => $comments));
        }
    }

    public function showLastPostAction($nbPosts){
        $repository = $this->getDoctrine()->getManager()->getRepository('BlogFrontBundle:Post');
        $posts = $repository->getLastPost($nbPosts);
        return $this->render('BlogFrontBundle:Default:index.html.twig', array('content' => 'Affichage des Posts','posts' => $posts));
}
}