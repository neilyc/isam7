<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ActiviteController extends Controller
{
  /**
   * @Route("/activite", name="activite")
   */
  public function indexAction()
  {
    $context = array();
    
    return $this->render('AppBundle:Partials:progress.html.twig', $context);
  }
}
