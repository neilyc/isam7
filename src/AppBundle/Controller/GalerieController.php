<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GalerieController extends Controller
{
  /**
   * @Route("/galerie", name="galerie")
   */
  public function indexAction()
  {
    $paintings = $this->getDoctrine()
      ->getRepository('AppBundle:Galerie')
      ->findAll();
        
    if (!$paintings) {
      $paintings = array();
    }

    $context = array(
      'paintings' => $paintings
    );
    return $this->render('AppBundle:Galerie:index.html.twig', $context);
  }
}
