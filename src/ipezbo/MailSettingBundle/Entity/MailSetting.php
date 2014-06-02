<?php

namespace ipezbo\MailSettingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MailSetting
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ipezbo\MailSettingBundle\Entity\MailSettingRepository")
 */
class MailSetting
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
     * @ORM\Column(name="transport", type="string", length=45)
     */
    private $transport;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=45)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="port", type="string", length=45)
     */
    private $port;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="usedMailSetting", type="boolean")
     */
    private $usedMailSetting;


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
     * Set transport
     *
     * @param string $transport
     * @return MailSetting
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    
        return $this;
    }

    /**
     * Get transport
     *
     * @return string 
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return MailSetting
     */
    public function setHost($host)
    {
        $this->host = $host;
    
        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set port
     *
     * @param string $port
     * @return MailSetting
     */
    public function setPort($port)
    {
        $this->port = $port;
    
        return $this;
    }

    /**
     * Get port
     *
     * @return string 
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return MailSetting
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return MailSetting
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set usedMailSetting
     *
     * @param boolean $usedMailSetting
     * @return MailSetting
     */
    public function setUsedMailSetting($usedMailSetting)
    {
        $this->usedMailSetting = $usedMailSetting;
    
        return $this;
    }

    /**
     * Get usedMailSetting
     *
     * @return boolean 
     */
    public function getUsedMailSetting()
    {
        return $this->usedMailSetting;
    }
}
