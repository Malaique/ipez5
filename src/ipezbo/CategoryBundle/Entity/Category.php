<?php

namespace ipezbo\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ipezbo\CategoryBundle\Entity\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields="name", message="Une catégorie existe déjà avec ce nom.")
 */
class Category {

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
     * @ORM\Column(name="name", type="string", length=45, unique=true)
     * @Assert\Length(
     *      min = "2",
     *      minMessage = "La nom doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=false)
     */
    private $image;
    private $file;
    private $tempFilename;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    public function getParentCategory() {
        return $this->parentCategory;
    }

    public function getTempFilename() {
        return $this->tempFilename;
    }

    public function setParentCategory($parentCategory) {
        $this->parentCategory = $parentCategory;
        return $this;
    }

    public function setTempFilename($tempFilename) {
        $this->tempFilename = $tempFilename;
        return $this;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Category
     */
    public function setImage($image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage() {
        return $this->image;
    }

    public function setFile(UploadedFile $file) {
        $this->file = $file;

        if (null !== $this->image) {
            $this->tempFilename = $this->image;
            $this->image = null;
        }
    }

    public function getFile() {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null === $this->file) {
            return;
        }
        $this->image = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->file) {
            return;
        }

        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $this->file->move(
                $this->getUploadRootDir(), $this->id . '.' . $this->image
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->image;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if (file_exists($this->tempFilename)) {
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir() {
        return 'uploads/categories/';
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getImagePath() {
        return $this->getUploadDir() . '/' . $this->getId() . '.' . $this->getImage();
    }

}
