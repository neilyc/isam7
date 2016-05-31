<?php
namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog")
 */
class Blog
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $filename;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $filename1;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $filename2;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $filename3;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $filename4;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

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
     * Set title
     *
     * @param string $title
     *
     * @return Blog
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Blog
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
     * Set filename1
     *
     * @param string $filename1
     *
     * @return Blog
     */
    public function setFilename1($filename1)
    {
        $this->filename1 = $filename1;

        return $this;
    }

    /**
     * Get filename1
     *
     * @return string
     */
    public function getFilename1()
    {
        return $this->filename1;
    }

    /**
     * Set filename2
     *
     * @param string $filename2
     *
     * @return Blog
     */
    public function setFilename2($filename2)
    {
        $this->filename2 = $filename2;

        return $this;
    }

    /**
     * Get filename2
     *
     * @return string
     */
    public function getFilename2()
    {
        return $this->filename2;
    }

    /**
     * Set filename3
     *
     * @param string $filename3
     *
     * @return Blog
     */
    public function setFilename3($filename3)
    {
        $this->filename3 = $filename3;

        return $this;
    }

    /**
     * Get filename3
     *
     * @return string
     */
    public function getFilename3()
    {
        return $this->filename3;
    }

    /**
     * Set filename4
     *
     * @param string $filename4
     *
     * @return Blog
     */
    public function setFilename4($filename4)
    {
        $this->filename4 = $filename4;

        return $this;
    }

    /**
     * Get filename4
     *
     * @return string
     */
    public function getFilename4()
    {
        return $this->filename4;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Blog
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
}
