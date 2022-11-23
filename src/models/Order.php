<?php
class Order
{
    private ?int $id = null;
    private ?string $type = null;
    private ?int $transactionId = null;
    private ?int $petId = null;
    private ?string $petName = null;
    private ?string $petSex = null;
    private ?string $petColor = null;
    private ?string $petTrait = null;
    private $image = null;
    private ?float $price = null;

    public function __construct(string $type, ?int $transactionId, int $petId, string $petName, $image, float $price)
    {
        $this->type = $type;
        $this->transactionId = $transactionId;
        $this->petId = $petId;
        $this->petName = $petName;
        $this->image = $image;
        $this->price = $price;
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
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of transactionId
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set the value of transactionId
     *
     * @return  self
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of petSex
     */
    public function getPetSex()
    {
        return $this->petSex;
    }

    /**
     * Set the value of petSex
     *
     * @return  self
     */
    public function setPetSex($petSex)
    {
        $this->petSex = $petSex;

        return $this;
    }

    /**
     * Get the value of petColor
     */
    public function getPetColor()
    {
        return $this->petColor;
    }

    /**
     * Set the value of petColor
     *
     * @return  self
     */
    public function setPetColor($petColor)
    {
        $this->petColor = $petColor;

        return $this;
    }

    /**
     * Get the value of petTrait
     */
    public function getPetTrait()
    {
        return $this->petTrait;
    }

    /**
     * Set the value of petTrait
     *
     * @return  self
     */
    public function setPetTrait($petTrait)
    {
        $this->petTrait = $petTrait;

        return $this;
    }
}
