<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Galerie;

class GalerieController extends Controller
{
  /**
   * @Route("/galerie")
   */
  public function listAction()
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
    return $this->render('AdminBundle:Galerie:list.html.twig', $context);
  }

  /**
   * @Route("/galerie/new")
   */
  public function newAction()
  {
    $series = $this->getDoctrine()
      ->getRepository('AppBundle:Serie')
      ->findAll();

    if (!$series) {
      $series = array();
    }
    $context = array(
      'painting' => new Galerie(),
      'series' => $series
    );
    return $this->render('AdminBundle:Galerie:form.html.twig', $context);
  }

  /**
   * @Route("/galerie/{id}/edit")
   */
  public function editAction($id)
  {
    $painting = $this->getDoctrine()
      ->getRepository('AppBundle:Galerie')
      ->find($id);

    $series = $this->getDoctrine()
      ->getRepository('AppBundle:Serie')
      ->findAll();

    if (!$series) {
      $series = array();
    }
    $context = array(
      'painting' => $painting,
      'series' => $series
    );
    return $this->render('AdminBundle:Galerie:form.html.twig', $context);
  }

  /**
   * @Route("/galerie/save")
   */
  public function saveAction(Request $request)
  {
    //var_dump($request->request->get('id'));die;
    if($request->request->get('id')) {
      $painting = $this->getDoctrine()
        ->getRepository('AppBundle:Galerie')
        ->find($request->request->get('id'));
    } else {
      $painting = new Galerie();
    }
    
    $painting->setName($request->request->get('name'));
    $painting->setDescription($request->request->get('description'));
    if($request->files->get('filename')) {
      $painting->setFile($request->files->get('filename'));
      $painting->uploadImage();
    }

    $serie = $this->getDoctrine()
        ->getRepository('AppBundle:Serie')
        ->find($request->request->get('serie'));

    $painting->setSerie($serie);

    $em = $this->getDoctrine()->getManager();
    $em->persist($painting);
    $em->flush();

    return $this->redirectToRoute('admin_galerie_list');
  }

  /**
   * @Route("/galerie/{id}/delete")
   */
  public function deleteAction($id)
  {
    if($id) {
      $painting = $this->getDoctrine()
        ->getRepository('AppBundle:Galerie')
        ->find($id);

      $em = $this->getDoctrine()->getManager();
      $em->remove($painting);
      $em->flush();
    } 

    return $this->redirectToRoute('admin_galerie_list');
  }
}
