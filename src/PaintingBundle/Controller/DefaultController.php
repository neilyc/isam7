<?php

namespace PaintingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
  /**
   * @Route("/")
   */
  public function indexAction()
  {
    $paintings = $this->getDoctrine()
      ->getRepository('PaintingBundle:Painting')
      ->findAll();
        
    if (!$paintings) {
      $paintings = array();
    }

    $context = array(
      'paintings' => $paintings
    );
    return $this->render('PaintingBundle:Default:index.html.twig', $context);
  }
}
