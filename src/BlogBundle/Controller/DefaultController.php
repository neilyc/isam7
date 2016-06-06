<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
  /**
   * @Route("/")
   */
  public function indexAction()
  {
    $blog = $this->getDoctrine()
      ->getRepository('BlogBundle:Blog')
      ->findAll();
        
    if (!$blog) {
      $blog = array();
    }

    $context = array(
      'blog' => $blog
    );
    return $this->render('BlogBundle:Default:index.html.twig', $context);
  }

  /**
   * @Route("/{id}")
   */
  public function viewAction($id)
  {
    $article = $this->getDoctrine()
      ->getRepository('BlogBundle:Blog')
      ->find($id);
        
    if (!$article) {
      $article = array();
    }
    
    $context = array(
      'article' => $article,
      'images'  => json_decode($article->getImages())
    );
    return $this->render('BlogBundle:Default:view.html.twig', $context);
  }
}
