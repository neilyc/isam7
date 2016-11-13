<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ActiviteController extends Controller
{
  /**
   * @Route("/activite")
   */
  public function indexAction()
  {
    $context = array();
    
    return $this->render('AppBundle:Partials:progress.html.twig', $context);
  }
}
