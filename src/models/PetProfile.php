<?php
class PetProfile
{
    private ?int $id = null;
    private $image = null;
    private ?string $name = null;
    private ?string $type = null;
    private ?DateTime $birthdate = null;
    private ?string $sex = null;
    private ?string $color = null;
    private ?string $trait = null;
    private ?bool $isVaccinated = null;
    private ?string $pcciStatus = null;
    private ?int $accountId = null;
    private ?string $ownerName = null;
    private ?float $price = null;
    private ?string $status = null;

    public function __construct($image, string $name, DateTime $birthdate, string $sex, string $color, string $trait, bool $isVaccinated, string $pcciStatus, int $accountId, string $ownerName, float $price, string $status)
    {
        $this->image = $image;
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->sex = $sex;
        $this->color = $color;
        $this->trait = $trait;
        $this->isVaccinated = $isVaccinated;
        $this->pcciStatus = $pcciStatus;
        $this->accountId = $accountId;
        $this->ownerName = $ownerName;
        $this->price = $price;
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

    private function capitalizeName($name)
    {
        $name = preg_split("/[\s,]+/", $name);
        $name = array_map('strtolower', $name);
        $name = array_map('ucfirst', $name);
        $name = implode(" ", $name);
        return $name;
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
        $this->name = $this->capitalizeName($name);

        return $this;
    }

    /**
     * Get the value of age
     */
    public function getTrait()
    {
        return $this->trait;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */
    public function setTrait($trait)
    {
        $this->trait = $trait;

        return $this;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of sex
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of isVaccinated
     */
    public function getIsVaccinated()
    {
        return $this->isVaccinated;
    }

    /**
     * Set the value of isVaccinated
     *
     * @return  self
     */
    public function setIsVaccinated($isVaccinated)
    {
        $this->isVaccinated = $isVaccinated;

        return $this;
    }

    /**
     * Get the value of accountId
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Set the value of accountId
     *
     * @return  self
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Get the value of ownerName
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * Set the value of ownerName
     *
     * @return  self
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $this->capitalizeName($ownerName);

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
     * Get the value of pcciStatus
     */
    public function getPcciStatus()
    {
        return $this->pcciStatus;
    }

    /**
     * Set the value of pcciStatus
     *
     * @return  self
     */
    public function setPcciStatus($pcciStatus)
    {
        $this->pcciStatus = $pcciStatus;

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
}
