<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Biographie;

class BioController extends Controller
{
  /**
   * @Route("/bio")
   */
  public function showAction()
  {
    $bio = $this->getDoctrine()
      ->getRepository('AppBundle:Biographie')
      ->find(1);
        
    if (!$bio) {
      $bio = array();
    }

    $context = array(
      'bio' => $bio
    );
    return $this->render('AdminBundle:Bio:show.html.twig', $context);
  }

  /**
   * @Route("/bio/edit")
   */
  public function editAction()
  {
    $bio = $this->getDoctrine()
      ->getRepository('AppBundle:Biographie')
      ->find(1);

    if (!$bio) {
      $bio = new Biographie();
    }

    $context = array(
      'bio' => $bio,
    );
    return $this->render('AdminBundle:Bio:form.html.twig', $context);
  }

  /**
   * @Route("/bio/save")
   */
  public function saveAction(Request $request)
  {
    $bio = $this->getDoctrine()
      ->getRepository('AppBundle:Biographie')
      ->find(1);

    if (!$bio) {
      $bio = new Biographie();
    }
    
    $bio->setDescription($request->request->get('description'));

    if($request->files->get('filename')) {
      $bio->setFile($request->files->get('filename'));
      $bio->uploadImage();
    }

    $em = $this->getDoctrine()->getManager();
    $em->persist($bio);
    $em->flush();

    return $this->redirectToRoute('admin_bio_show');
  }
}
