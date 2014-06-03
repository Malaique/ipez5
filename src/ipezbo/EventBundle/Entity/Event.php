<?php

namespace ipezbo\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ipezbo\EventBundle\Entity\EventRepository")
 */
class Event
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=45)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=5)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="additionalDetails", type="text")
     */
    private $additionalDetails;

    /**
     * @var string
     *
     * @ORM\Column(name="coordinatesLatitude", type="decimal")
     */
    private $coordinatesLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coordinatesLongitude", type="decimal")
     */
    private $coordinatesLongitude;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startEvent", type="datetime")
     */
    private $startEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endEvent", type="datetime")
     */
    private $endEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="backgroundColor", type="string", length=7)
     */
    private $backgroundColor;

    /**
     * @ORM\OneToOne(targetEntity="ipezbo\NewsletterBundle\Entity\Newsletter", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false) 
     */
    private $newsletter;

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
     * @return Event
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
     * @return Event
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
     * Set street
     *
     * @param string $street
     * @return Event
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Event
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Event
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set additionalDetails
     *
     * @param string $additionalDetails
     * @return Event
     */
    public function setAdditionalDetails($additionalDetails)
    {
        $this->additionalDetails = $additionalDetails;

        return $this;
    }

    /**
     * Get additionalDetails
     *
     * @return string 
     */
    public function getAdditionalDetails()
    {
        return $this->additionalDetails;
    }

    /**
     * Set coordinatesLatitude
     *
     * @param string $coordinatesLatitude
     * @return Event
     */
    public function setCoordinatesLatitude($coordinatesLatitude)
    {
        $this->coordinatesLatitude = $coordinatesLatitude;

        return $this;
    }

    /**
     * Get coordinatesLatitude
     *
     * @return string 
     */
    public function getCoordinatesLatitude()
    {
        return $this->coordinatesLatitude;
    }

    /**
     * Set coordinatesLongitude
     *
     * @param string $coordinatesLongitude
     * @return Event
     */
    public function setCoordinatesLongitude($coordinatesLongitude)
    {
        $this->coordinatesLongitude = $coordinatesLongitude;

        return $this;
    }

    /**
     * Get coordinatesLongitude
     *
     * @return string 
     */
    public function getCoordinatesLongitude()
    {
        return $this->coordinatesLongitude;
    }

    /**
     * Set startEvent
     *
     * @param \DateTime $startEvent
     * @return Event
     */
    public function setStartEvent($startEvent)
    {
        $this->startEvent = $startEvent;

        return $this;
    }

    /**
     * Get startEvent
     *
     * @return \DateTime 
     */
    public function getStartEvent()
    {
        return $this->startEvent;
    }

    /**
     * Set endEvent
     *
     * @param \DateTime $endEvent
     * @return Event
     */
    public function setEndEvent($endEvent)
    {
        $this->endEvent = $endEvent;

        return $this;
    }

    /**
     * Get endEvent
     *
     * @return \DateTime 
     */
    public function getEndEvent()
    {
        return $this->endEvent;
    }

    /**
     * Set backgroundColor
     *
     * @param string $backgroundColor
     * @return Event
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Get backgroundColor
     *
     * @return string 
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }


    /**
     * Set newsletter
     *
     * @param \ipezbo\NewsletterBundle\Entity\Newsletter $newsletter
     * @return Event
     */
    public function setNewsletter(\ipezbo\NewsletterBundle\Entity\Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    
        return $this;
    }

    /**
     * Get newsletter
     *
     * @return \ipezbo\NewsletterBundle\Entity\Newsletter 
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }
}
