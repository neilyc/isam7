<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class Galerie extends AbstractAdmin
{
  /**
   * @param ListMapper $listMapper
   */
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->add('name', null, array('label' => 'Nom'))
      ->add('image', null, array('template' => 'AppBundle:Admin:galerie_image.html.twig', 'label' => 'Image'))
      ->add('_action', 'actions', array(
        'actions' => array(
          'edit' => array(),
          'delete' => array(),
        )
      ))
    ;
  }

  /**
   * @param FormMapper $formMapper
   */
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->add('name', null, array('label' => 'Nom'))
      ->add('description')
      ->add('file', 'file', array('required'=>false,'label'=> "Image"))
      ->add('categories')
    ;
  }

  protected function configureRoutes(RouteCollection $collection)
  {
    $collection
      ->remove('export')
    ;
  }

  public function prePersist($painting)
  {
    $this->savePainting($painting);
  }

  public function preUpdate($painting)
  {
    $this->savePainting($painting);
  }

  private function savePainting($painting)
  {
    // upload de l'image
    if ($painting->getFile()) {
        $painting->uploadImage();
    }
  }
}
