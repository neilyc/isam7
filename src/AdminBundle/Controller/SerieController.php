<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Serie;

class SerieController extends Controller
{
  /**
   * @Route("/serie")
   */
  public function listAction()
  {
    $series = $this->getDoctrine()
      ->getRepository('AppBundle:Serie')
      ->findAll();
        
    if (!$series) {
      $series = array();
    }

    $context = array(
      'series' => $series
    );
    return $this->render('AdminBundle:Serie:list.html.twig', $context);
  }

  /**
   * @Route("/serie/new")
   */
  public function newAction()
  {
    $context = array(
      'serie' => new Serie(),
    );
    return $this->render('AdminBundle:Serie:form.html.twig', $context);
  }

  /**
   * @Route("/serie/{id}/edit")
   */
  public function editAction($id)
  {
    $serie = $this->getDoctrine()
      ->getRepository('AppBundle:Serie')
      ->find($id);

    if (!$serie) {
      $serie = array();
    }
    $context = array(
      'serie' => $serie
    );
    return $this->render('AdminBundle:Serie:form.html.twig', $context);
  }

  /**
   * @Route("/serie/save")
   */
  public function saveAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    if($request->request->get('id')) {
      $serie = $this->getDoctrine()
        ->getRepository('AppBundle:Serie')
        ->find($request->request->get('id'));
    } else {
      $serie = new Serie();
    }


    if(strlen($request->request->get('new-paintings')) > 0) {
      $newPaintings = explode(",", $request->request->get('new-paintings'));
      //var_dump($newPaintings);die;
      foreach ($newPaintings as $value) {
        $painting = $this->getDoctrine()
          ->getRepository('AppBundle:Galerie')
          ->find($value);

        $painting->setSerie($serie);
        $em->persist($painting);
      }
    }

    if(strlen($request->request->get('delete-paintings')) > 0) {
      $deletePaintings = explode(",", $request->request->get('delete-paintings'));
      foreach ($deletePaintings as $value) {
        $painting = $this->getDoctrine()
          ->getRepository('AppBundle:Galerie')
          ->find($value);

        $painting->setSerie();
        $em->persist($painting);
      }
    }

		$serie->setName($request->request->get('name'));
    
    
    $em->persist($serie);
    $em->flush();

    return $this->redirectToRoute('admin_serie_edit', ["id" => $serie->getId()]);
  }

  /**
   * @Route("/serie/{id}/delete")
   */
  public function deleteAction($id)
  {
    if($id) {
      $serie = $this->getDoctrine()
        ->getRepository('AppBundle:Serie')
        ->find($id);

      $em = $this->getDoctrine()->getManager();
      $em->remove($serie);
      $em->flush();
    } 

    return $this->redirectToRoute('admin_serie_list');
  }
  
  /**
   * @Route("/serie/paintings")
   */
  public function paintingsAction()
  {
    $paintings = $this->getDoctrine()
      ->getRepository('AppBundle:Galerie')
      ->findBy(
        ['serie'=>NULL]
      );
      
    $context = array(
      'paintings' => $paintings
    );

    return $this->render('AdminBundle:Serie:paintings.html.twig', $context);
  }
}
