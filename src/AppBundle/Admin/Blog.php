<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class Blog extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('image')
            ->add('images')
            ->add('description')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', null, array('label' => 'Titre'))
            ->add('image', null, array('template' => 'AppBundle:Admin:blog_image.html.twig', 'label' => 'Image'))
            ->add('images', null, array('template' => 'AppBundle:Admin:blog_images.html.twig', 'label' => 'Images'))
            ->add('description')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
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
            ->add('title')
            ->add('description')
            ->add('file', 'file', array('label' => 'Image principale'));
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('image')
            ->add('images')
            ->add('description')
        ;
    }

  public function prePersist($blog)
  {
    $this->saveImage($blog);
  }

  public function preUpdate($blog)
  {
    $this->saveImage($blog);
  }

  private function saveImage($blog)
  {
    // upload de l'image
    if ($blog->getFile()) {
        $blog->uploadImage();
    }
  }
}
