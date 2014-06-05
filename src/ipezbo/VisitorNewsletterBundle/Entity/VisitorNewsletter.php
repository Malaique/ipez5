<?php

namespace ipezbo\VisitorNewsletterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="uniq_alertVisitor", columns={"visitorNewsletterMail", "brand_id", "category_id"})
 *      }
 * )
 */
class VisitorNewsletter {

    /**
     * @ORM\Id

     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="visitorNewsletterMail", type="string", length=45)
     */
    private $visitorNewsletterMail;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\BrandBundle\Entity\Brand")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="ipezbo\CategoryBundle\Entity\Category")
     */
    private $category;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registrationDate", type="datetime")
     */
    private $registrationDate;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set visitorNewsletterMail
     *
     * @param string $visitorNewsletterMail
     * @return VisitorNewsletter
     */
    public function setVisitorNewsletterMail($visitorNewsletterMail) {
        $this->visitorNewsletterMail = $visitorNewsletterMail;

        return $this;
    }

    /**
     * Get visitorNewsletterMail
     *
     * @return string 
     */
    public function getVisitorNewsletterMail() {
        return $this->visitorNewsletterMail;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     * @return VisitorNewsletter
     */
    public function setRegistrationDate($registrationDate) {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime 
     */
    public function getRegistrationDate() {
        return $this->registrationDate;
    }


    /**
     * Set brand
     *
     * @param \ipezbo\BrandBundle\Entity\Brand $brand
     * @return VisitorNewsletter
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
     * @return VisitorNewsletter
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
