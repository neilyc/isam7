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
    /*$series = $this->getDoctrine()
      ->getRepository('AppBundle:Serie')
      ->findAll();
        
    if (!$series) {
      $series = array();
    }

    $context = array(
      'series' => $series
    );
    return $this->render('AppBundle:Galerie:index.html.twig', $context);*/
    $paintings = $this->getDoctrine()
      ->getRepository('AppBundle:Galerie')
      ->findAll();
        
    //$paintings = $paintings->getPaintings();

    if (!$paintings) {
      $paintings = array();
    }

    $context = array(
      'paintings' => $paintings
    );
    return $this->render('AppBundle:Galerie:view.html.twig', $context);
  }

  /**
   * @Route("/galerie/{id}", name="galerie_view")
   */
  public function viewAction($id)
  {
    $serie = $this->getDoctrine()
      ->getRepository('AppBundle:Serie')
      ->find($id);
        
    $paintings = $serie->getPaintings();

    if (!$paintings) {
      $paintings = array();
    }

    $context = array(
      'paintings' => $paintings
    );
    return $this->render('AppBundle:Galerie:view.html.twig', $context);
  }
}
