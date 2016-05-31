<?php

namespace BioBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class BiographyAdmin extends AbstractAdmin
{
  /**
   * @param ListMapper $listMapper
   */
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->add('_action', 'actions', array(
        'actions' => array(
          'edit' => array(),
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
      ->add('file', 'file', array('required'=>false,'label'=> "Image"))
      ->add('description')
    ;
  }

  protected function configureRoutes(RouteCollection $collection)
  {
    $collection
      ->remove('export')
      ->remove('create')
      ->remove('delete')
    ;
  }

  public function prePersist($bio)
  {
    $this->saveBio($bio);
  }

  public function preUpdate($bio)
  {
    $this->saveBio($bio);
  }

  private function saveBio($bio)
  {
    // upload de l'image
    if ($bio->getFile()) {
        $bio->uploadImage();
    }
  }
}
