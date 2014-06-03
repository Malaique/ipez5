<?php

namespace ipezbo\SliderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Slider
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ipezbo\SliderBundle\Entity\SliderRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity("position")
 */
class Slider {

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
     * @ORM\Column(name="title", type="string", length=45)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=45)
     */
    private $image;
    private $file;
    private $tempFilename;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", unique=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=45)
     */
    private $link;

    /**
     * @var boolean
     *
     * @ORM\Column(name="target", type="boolean")
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(name="backgroundColor", type="string", length=7)
     */
    private $backgroundColor;

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getLink() {
        return $this->link;
    }

    public function getTarget() {
        return $this->target;
    }

    public function getBackgroundColor() {
        return $this->backgroundColor;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
        return $this;
    }

    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    public function setLink($link) {
        $this->link = $link;
        return $this;
    }

    public function setTarget($target) {
        $this->target = $target;
        return $this;
    }

    public function setBackgroundColor($backgroundColor) {
        $this->backgroundColor = $backgroundColor;
        return $this;
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
        return 'uploads/slides/';
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getImagePath() {
        return $this->getUploadDir() . '/' . $this->getId() . '.' . $this->getImage();
    }

}
