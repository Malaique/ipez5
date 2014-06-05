<?php

namespace ipezbo\AlertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="uniq_alert", columns={"customer_id", "brand_id", "category_id"})
 *      }
 * )
 */
class Alert {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\CustomerBundle\Entity\Customer")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\BrandBundle\Entity\Brand")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\CategoryBundle\Entity\Category")
     */
    private $category;

    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Set customer
     *
     * @param \ipezbo\CustomerBundle\Entity\Customer $customer
     * @return Alert
     */
    public function setCustomer(\ipezbo\CustomerBundle\Entity\Customer $customer) {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \ipezbo\CustomerBundle\Entity\Customer 
     */
    public function getCustomer() {
        return $this->customer;
    }

    /**
     * Set brand
     *
     * @param \ipezbo\BrandBundle\Entity\Brand $brand
     * @return Alert
     */
    public function setBrand(\ipezbo\BrandBundle\Entity\Brand $brand) {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \ipezbo\BrandBundle\Entity\Brand 
     */
    public function getBrand() {
        return $this->brand;
    }

    /**
     * Set category
     *
     * @param \ipezbo\CategoryBundle\Entity\Category $category
     * @return Alert
     */
    public function setCategory(\ipezbo\CategoryBundle\Entity\Category $category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ipezbo\CategoryBundle\Entity\Category 
     */
    public function getCategory() {
        return $this->category;
    }

}
