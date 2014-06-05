<?php

namespace ipezbo\ParticipationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ipezbo\ParticipationBundle\Entity\ParticipationRepository")
 */
class Participation {

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
     * @ORM\ManyToOne(targetEntity="ipezbo\EventBundle\Entity\Event")
     */
    private $event;

    /**
     * @var string
     *
     * @ORM\Column(name="requestMessage", type="text")
     */
    private $requestMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requestParticipationDate", type="datetime")
     */
    private $requestParticipationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requestTime", type="datetime")
     */
    private $requestTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="requestAccepted", type="boolean")
     */
    private $requestAccepted;

    /**
     * @var boolean
     *
     * @ORM\Column(name="participationConfirmation", type="boolean")
     */
    private $participationConfirmation;

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set requestMessage
     *
     * @param string $requestMessage
     * @return Participation
     */
    public function setRequestMessage($requestMessage) {
        $this->requestMessage = $requestMessage;

        return $this;
    }

    /**
     * Get requestMessage
     *
     * @return string 
     */
    public function getRequestMessage() {
        return $this->requestMessage;
    }

    /**
     * Set requestParticipationDate
     *
     * @param \DateTime $requestParticipationDate
     * @return Participation
     */
    public function setRequestParticipationDate($requestParticipationDate) {
        $this->requestParticipationDate = $requestParticipationDate;

        return $this;
    }

    /**
     * Get requestParticipationDate
     *
     * @return \DateTime 
     */
    public function getRequestParticipationDate() {
        return $this->requestParticipationDate;
    }

    /**
     * Set requestTime
     *
     * @param \DateTime $requestTime
     * @return Participation
     */
    public function setRequestTime($requestTime) {
        $this->requestTime = $requestTime;

        return $this;
    }

    /**
     * Get requestTime
     *
     * @return \DateTime 
     */
    public function getRequestTime() {
        return $this->requestTime;
    }

    /**
     * Set requestAccepted
     *
     * @param boolean $requestAccepted
     * @return Participation
     */
    public function setRequestAccepted($requestAccepted) {
        $this->requestAccepted = $requestAccepted;

        return $this;
    }

    /**
     * Get requestAccepted
     *
     * @return boolean 
     */
    public function getRequestAccepted() {
        return $this->requestAccepted;
    }

    /**
     * Set participationConfirmation
     *
     * @param boolean $participationConfirmation
     * @return Participation
     */
    public function setParticipationConfirmation($participationConfirmation) {
        $this->participationConfirmation = $participationConfirmation;

        return $this;
    }

    /**
     * Get participationConfirmation
     *
     * @return boolean 
     */
    public function getParticipationConfirmation() {
        return $this->participationConfirmation;
    }

    /**
     * Set customer
     *
     * @param \ipezbo\CustomerBundle\Entity\Customer $customer
     * @return Participation
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
     * Set event
     *
     * @param \ipezbo\EventBundle\Entity\Event $event
     * @return Participation
     */
    public function setEvent(\ipezbo\EventBundle\Entity\Event $event) {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \ipezbo\EventBundle\Entity\Event 
     */
    public function getEvent() {
        return $this->event;
    }

}
