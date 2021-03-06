<?php

namespace ipezbo\NewsletterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Newsletter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ipezbo\NewsletterBundle\Entity\NewsletterRepository")
 */
class Newsletter
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
     * @ORM\Column(name="subject", type="string", length=45)
     * @Assert\Length(
     *      min = "5",
     *      minMessage = "Le sujet doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     * @Assert\Length(
     *      min = "10",
     *      minMessage = "Le message doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="expeditorEmail", type="string", length=45)
     * @Assert\Email(
     *     message = "'{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     */
    private $expeditorEmail;


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
     * Set subject
     *
     * @param string $subject
     * @return Newsletter
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Newsletter
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set expeditorEmail
     *
     * @param string $expeditorEmail
     * @return Newsletter
     */
    public function setExpeditorEmail($expeditorEmail)
    {
        $this->expeditorEmail = $expeditorEmail;
    
        return $this;
    }

    /**
     * Get expeditorEmail
     *
     * @return string 
     */
    public function getExpeditorEmail()
    {
        return $this->expeditorEmail;
    }
}
