<?php

namespace ipezbo\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ipezbo\ProductBundle\Entity\ProductRepository")
 */
class Product
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=45)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=45)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\CategoryBundle\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\BrandBundle\Entity\Brand")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\EventBundle\Entity\Event")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;

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
     * @return Product
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
     * Set reference
     *
     * @param string $reference
     * @return Product
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
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
     * Set quantity
     *
     * @param integer $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }


    /**
     * Set category
     *
     * @param \ipezbo\CategoryBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\ipezbo\CategoryBundle\Entity\Category $category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \ipezbo\CategoryBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set brand
     *
     * @param \ipezbo\BrandBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\ipezbo\BrandBundle\Entity\Brand $brand)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return \ipezbo\BrandBundle\Entity\Brand 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set event
     *
     * @param \ipezbo\EventBundle\Entity\Event $event
     * @return Product
     */
    public function setEvent(\ipezbo\EventBundle\Entity\Event $event)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return \ipezbo\EventBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
