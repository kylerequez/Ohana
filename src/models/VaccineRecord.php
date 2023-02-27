<?php

class VaccineRecord
{
    private ?int $id = null;
    private ?string $petReference = null;
    private ?string $image = null;
    private ?string $name = null;
    private ?DateTime $vaccineDate = null;
    private ?DateTime $revaccinationDate = null;

    public function __construct(string $petReference, string $image, string $name, DateTime $vaccineDate, DateTime $revaccinationDate)
    {
        $this->petReference = $petReference;
        $this->image = $image;
        $this->name = $name;
        $this->vaccineDate = $vaccineDate;
        $this->revaccinationDate = $revaccinationDate;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of petId
     */
    public function getPetId(): ?int
    {
        return $this->petId;
    }

    /**
     * Set the value of petId
     */
    public function setPetId(?int $petId): self
    {
        $this->petId = $petId;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of vaccineDate
     */
    public function getVaccineDate(): ?DateTime
    {
        return $this->vaccineDate;
    }

    /**
     * Set the value of vaccineDate
     */
    public function setVaccineDate(?DateTime $vaccineDate): self
    {
        $this->vaccineDate = $vaccineDate;

        return $this;
    }

    /**
     * Get the value of revaccinationDate
     */
    public function getRevaccinationDate(): ?DateTime
    {
        return $this->revaccinationDate;
    }

    /**
     * Set the value of revaccinationDate
     */
    public function setRevaccinationDate(?DateTime $revaccinationDate): self
    {
        $this->revaccinationDate = $revaccinationDate;

        return $this;
    }

    /**
     * Get the value of petReference
     */
    public function getPetReference(): ?string
    {
        return $this->petReference;
    }

    /**
     * Set the value of petReference
     */
    public function setPetReference(?string $petReference): self
    {
        $this->petReference = $petReference;

        return $this;
    }
}
