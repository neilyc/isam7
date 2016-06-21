<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BioController extends Controller
{
  /**
   * @Route("/biographie", name="biographie")
   */
  public function indexAction()
  {
    $bio = $this->getDoctrine()
      ->getRepository('AppBundle:Biographie')
      ->find(1);
        
    if (!$bio) {
      return $this->render('AppBundle:Partials:progress.html.twig');
    }

    $context = array(
      'bio' => $bio
    );
    
    return $this->render('AppBundle:Bio:index.html.twig', $context);
  }
}
