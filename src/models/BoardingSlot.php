<?php

class BoardingSlot
{
    private ?int $id = null;
    private $image = null;
    private ?string $name = null;
    private ?string $information = null;
    private ?bool $isAvailable = null;
    private ?int $petId = null;
    private ?string $petName = null;

    public function __construct($image, string $name, string $information, bool $isAvailable, int $petId, string $petName)
    {
        $this->image = $image;
        $this->name = $name;
        $this->information = $information;
        $this->isAvailable = $isAvailable;
        $this->petId = $petId;
        $this->petName = $petName;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of information
     */ 
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set the value of information
     *
     * @return  self
     */ 
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get the value of isAvailable
     */ 
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * Set the value of isAvailable
     *
     * @return  self
     */ 
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * Get the value of petId
     */ 
    public function getPetId()
    {
        return $this->petId;
    }

    /**
     * Set the value of petId
     *
     * @return  self
     */ 
    public function setPetId($petId)
    {
        $this->petId = $petId;

        return $this;
    }

    /**
     * Get the value of petName
     */ 
    public function getPetName()
    {
        return $this->petName;
    }

    /**
     * Set the value of petName
     *
     * @return  self
     */ 
    public function setPetName($petName)
    {
        $this->petName = $petName;

        return $this;
    }
}