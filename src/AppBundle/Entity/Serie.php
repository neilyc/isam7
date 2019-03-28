<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="series")
 */
class Serie
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Galerie", mappedBy="serie")
     */
    private $paintings;

    public function __construct()
    {
        $this->paintings = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Serie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add painting
     *
     * @param \AppBundle\Entity\Galerie $painting
     *
     * @return Serie
     */
    public function addPainting(\AppBundle\Entity\Galerie $painting)
    {
        $this->paintings[] = $painting;

        return $this;
    }

    /**
     * Remove painting
     *
     * @param \AppBundle\Entity\Galerie $painting
     */
    public function removePainting(\AppBundle\Entity\Galerie $painting)
    {
        $this->paintings->removeElement($painting);
    }

    /**
     * Get paintings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaintings()
    {
        return $this->paintings;
    }
}
