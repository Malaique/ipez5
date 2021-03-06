<?php

namespace ipezbo\GeneralSettingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * GeneralSetting
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ipezbo\GeneralSettingBundle\Entity\GeneralSettingRepository")
 * @UniqueEntity(fields="settingAttribute", message="Un paramètre existe déjà avec ce nom.")
 */
class GeneralSetting
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
     * @ORM\Column(name="settingAttribute", type="string", length=45, unique=true)
     * @Assert\Length(
     *      min = "2",
     *      minMessage = "Le paramètre doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $settingAttribute;

    /**
     * @var string
     *
     * @ORM\Column(name="settingValue", type="text")
     */
    private $settingValue;


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
     * Set settingAttribute
     *
     * @param string $settingAttribute
     * @return GeneralSetting
     */
    public function setSettingAttribute($settingAttribute)
    {
        $this->settingAttribute = $settingAttribute;
    
        return $this;
    }

    /**
     * Get settingAttribute
     *
     * @return string 
     */
    public function getSettingAttribute()
    {
        return $this->settingAttribute;
    }

    /**
     * Set settingValue
     *
     * @param string $settingValue
     * @return GeneralSetting
     */
    public function setSettingValue($settingValue)
    {
        $this->settingValue = $settingValue;
    
        return $this;
    }

    /**
     * Get settingValue
     *
     * @return string 
     */
    public function getSettingValue()
    {
        return $this->settingValue;
    }
}
