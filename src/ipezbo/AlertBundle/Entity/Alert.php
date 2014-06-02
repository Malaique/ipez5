<?php

namespace ipezbo\AlertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Alert
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="ipezbo\CustomerBundle\Entity\Customer")
     */
    private $customer;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="ipezbo\BrandBundle\Entity\Brand")
     */
    private $brand;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="ipezbo\CategoryBundle\Entity\Category")
     */
    private $category;

    /**
     * Set customer
     *
     * @param \ipezbo\CustomerBundle\Entity\Customer $customer
     * @return Alert
     */
    public function setCustomer(\ipezbo\CustomerBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \ipezbo\CustomerBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set brand
     *
     * @param \ipezbo\BrandBundle\Entity\Brand $brand
     * @return Alert
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
     * Set category
     *
     * @param \ipezbo\CategoryBundle\Entity\Category $category
     * @return Alert
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

}
