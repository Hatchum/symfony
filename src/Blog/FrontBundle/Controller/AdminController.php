<?php
/**
 * Created by PhpStorm.
 * User: arthu
 * Date: 03/02/2017
 * Time: 12:18
 */

namespace Blog\FrontBundle\Controller;

use Blog\FrontBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AdminController extends Controller
{
    public function editAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('BlogFrontBundle:Post')
                    ->find($id);

        $form = $this->createFormBuilder($post)
            ->add('title', 'text', array(
                'constraints' => array(
                    new NotBlank
                )
            ))
            ->add('text', 'textarea', array(
                'constraints' => array(
                    new NotBlank
                )
            ))
            ->add('datePublish', 'date', array(
                'constraints' => array(
                    new NotBlank
                ),
                'widget' => 'choice',
                'format' => 'ddMMMMyyyy'
            ))
            ->add('user', EntityType::class, array(
                'class' => 'BlogFrontBundle:User',
                'choice_label' => 'name'
            ))
            ->add('Modifier', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()) {
                $validForm = 'Modification Valide';

                $em->persist($post);
                $em->flush();
                $response = new Response($validForm);
            } else
                $response = 'false';
        } else
            $response = 'null';

        return $this->render('BlogFrontBundle:Admin:adminPost.html.twig',
                        array("form"=>$form->createView(), 'response' => $response)
            );
    }

    public function addAction(Request $request) {
        $post = new Post();

        $form = $this->createFormBuilder($post)
            ->add('title', 'text', array(
                'constraints' => array(
                    new NotBlank
                )
            ))
            ->add('text', 'textarea', array(
                'constraints' => array(
                    new NotBlank
                )
            ))
            ->add('datePublish', 'date', array(
                'constraints' => array(
                    new NotBlank
                ),
                'widget' => 'choice',
                'format' => 'ddMMMMyyyy'
            ))
            ->add('user', EntityType::class, array(
                'class' => 'BlogFrontBundle:User',
                'choice_label' => 'name'
            ))
            ->add('Modifier', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()) {
                $validForm = 'Ajout du Post Valide';
                $em = $this->getDoctrine()->getManager();
                $em->persist($post);
                $em->flush();
                $response = new Response($validForm);
            } else
                $response = 'false';
        } else
            $response = 'null';

        return $this->render('BlogFrontBundle:Admin:adminPost.html.twig',
            array("form"=>$form->createView(), 'response' => $response)
        );
    }
}