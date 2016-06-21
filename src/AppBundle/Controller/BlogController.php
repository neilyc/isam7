<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
  /**
   * @Route("/blog", name="blog")
   */
  public function indexAction()
  {
    $blog = $this->getDoctrine()
      ->getRepository('AppBundle:Blog')
      ->findAll();
        
    if (!$blog) {
      return $this->render('AppBundle:Partials:progress.html.twig');
    }

    $context = array(
      'blog' => $blog
    );
    return $this->render('AppBundle:Blog:index.html.twig', $context);
  }

  /**
   * @Route("/blog/{id}", name="blog_view")
   */
  public function viewAction($id)
  {
    $article = $this->getDoctrine()
      ->getRepository('AppBundle:Blog')
      ->find($id);
        
    if (!$article) {
      return $this->render('AppBundle:Partials:progress.html.twig');
    }
    
    $context = array(
      'article' => $article,
      'images'  => json_decode($article->getImages())
    );
    return $this->render('AppBundle:Blog:view.html.twig', $context);
  }
}
