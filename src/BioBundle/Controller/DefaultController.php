<?php

namespace BioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
  /**
   * @Route("/")
   */
  public function indexAction()
  {
    $bio = $this->getDoctrine()
      ->getRepository('BioBundle:Biography')
      ->find(1);
        
    if (!$bio) {
      return $this->render('AppBundle:Partials:progress.html.twig');
    }

    $context = array(
      'bio' => $bio
    );
    
    return $this->render('BioBundle:Default:index.html.twig', $context);
  }
}
