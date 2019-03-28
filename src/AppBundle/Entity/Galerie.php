<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\Table(name="painting")
 */
class Galerie
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
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $filename;

    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="paintings")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id")
     */
    private $serie;

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
     * @return Painting
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
     * Set description
     *
     * @param string $description
     *
     * @return Painting
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Painting
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }
 
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function uploadImage()
    {
        if (null === $this->getFile()) {
            return;
        }
        $filename = date('dmYHis').'.'.$this->getFile()->guessExtension();

        $this->getFile()->move(
            __DIR__ . '/../../../web/upload/paintings',
            $filename
        );

        $this->filename = $filename;

        $this->setFile(null);
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Set serie
     *
     * @param \AppBundle\Entity\serie $serie
     *
     * @return Galerie
     */
    public function setSerie(\AppBundle\Entity\serie $serie = null)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return \AppBundle\Entity\serie
     */
    public function getSerie()
    {
        return $this->serie;
    }
}
