<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Blog;

class BlogController extends Controller
{
  /**
   * @Route("/blog")
   */
  public function listAction()
  {
    $blogs = $this->getDoctrine()
      ->getRepository('AppBundle:Blog')
      ->findAll();
        
    if (!$blogs) {
      $blogs = array();
    }

    $context = array(
      'blogs' => $blogs
    );
    return $this->render('AdminBundle:Blog:list.html.twig', $context);
  }

  /**
   * @Route("/blog/new")
   */
  public function newAction()
  {
    $context = array(
      'blog' => new Blog(),
    );
    return $this->render('AdminBundle:Blog:form.html.twig', $context);
  }

  /**
   * @Route("/blog/{id}/edit")
   */
  public function editAction($id)
  {
    $blog = $this->getDoctrine()
      ->getRepository('AppBundle:Blog')
      ->find($id);

    $context = array(
      'blog' => $blog,
    );
    return $this->render('AdminBundle:Blog:form.html.twig', $context);
  }

  /**
   * @Route("/blog/save")
   */
  public function saveAction(Request $request)
  {
    //var_dump($request->request->get('id'));die;
    if($request->request->get('id')) {
      $blog = $this->getDoctrine()
        ->getRepository('AppBundle:Blog')
        ->find($request->request->get('id'));
    } else {
      $blog = new Blog();
    }
    
    $blog->setTitle($request->request->get('title'));
    $blog->setDescription($request->request->get('description'));
    if($request->files->get('image')) {
      $blog->setFile($request->files->get('image'));
      $blog->uploadImage();
    }

    $em = $this->getDoctrine()->getManager();
    $em->persist($blog);
    $em->flush();

    return $this->redirectToRoute('admin_blog_list');
  }

  /**
   * @Route("/blog/{id}/delete")
   */
  public function deleteAction($id)
  {
    if($id) {
      $blog = $this->getDoctrine()
        ->getRepository('AppBundle:Blog')
        ->find($id);

      $em = $this->getDoctrine()->getManager();
      $em->remove($blog);
      $em->flush();
    } 

    return $this->redirectToRoute('admin_blog_list');
  }
}
