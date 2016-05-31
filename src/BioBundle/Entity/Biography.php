<?php
namespace BioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\Table(name="biography")
 */
class Biography
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
    protected $filename;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * Unmapped property to handle file uploads
     */
    private $file;

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
     * Set filename
     *
     * @param string $filename
     *
     * @return Biography
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
     * Set description
     *
     * @param string $description
     *
     * @return Biography
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
            __DIR__ . '/../../../web/upload/bio',
            $filename
        );

        $this->filename = $filename;

        $this->setFile(null);
    }

    public function __toString()
    {
        return "Biographie";
    }
}
