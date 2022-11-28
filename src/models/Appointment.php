<?php
class Appointment implements JsonSerializable
{
    // Instance Variable
    private ?int $id = null;
    private ?string $title = null;
    private ?string $type = null;
    private ?int $accountId = null;
    private ?string $customerName = null;
    private ?string $description = null;
    private ?DateTime $startDate = null;
    private ?DateTime $endDate = null;
    private ?string $status = null;
    private ?string $number = null;

    // Constructor
    public function __construct(string $title, string $type, ?int $accountId, ?string $customerName, string $description, DateTime $startDate, DateTime $endDate)
    {
        $this->title = $title;
        $this->type = $type;
        $this->accountId = $accountId;
        $this->customerName = $customerName;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    // Implement JsonSerialize
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Get the value of customerName
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Set the value of customerName
     *
     * @return  self
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @return  self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get the value of endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @return  self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

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
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}
