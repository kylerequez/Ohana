<?php
class StudHistory
{
    private ?int $id = null;
    private ?int $maleId = null;
    private ?PetProfile $male = null;
    private ?int $femaleId = null;
    private ?PetProfile $female = null;
    private ?DateTime $date = null;
    private ?string $status = null;

    public function __construct(int $maleId, int $femaleId, ?DateTime $date, string $status)
    {
        $this->maleId = $maleId;
        $this->femaleId = $femaleId;
        $this->date = $date;
        $this->status = $status;
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
     * Get the value of maleId
     */ 
    public function getMaleId()
    {
        return $this->maleId;
    }

    /**
     * Set the value of maleId
     *
     * @return  self
     */ 
    public function setMaleId($maleId)
    {
        $this->maleId = $maleId;

        return $this;
    }

    /**
     * Get the value of male
     */ 
    public function getMale()
    {
        return $this->male;
    }

    /**
     * Set the value of male
     *
     * @return  self
     */ 
    public function setMale($male)
    {
        $this->male = $male;

        return $this;
    }

    /**
     * Get the value of femaleId
     */ 
    public function getFemaleId()
    {
        return $this->femaleId;
    }

    /**
     * Set the value of femaleId
     *
     * @return  self
     */ 
    public function setFemaleId($femaleId)
    {
        $this->femaleId = $femaleId;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of female
     */ 
    public function getFemale()
    {
        return $this->female;
    }

    /**
     * Set the value of female
     *
     * @return  self
     */ 
    public function setFemale($female)
    {
        $this->female = $female;

        return $this;
    }
}