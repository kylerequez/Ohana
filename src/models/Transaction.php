<?php
class Transaction
{
    private ?int $id = null;
    private ?int $accountId = null;
    private ?float $price = null;
    private ?DateTime $date = null;
    private ?string $status = null;
    private $paymentConfirmation = null;
    private ?array $listOfOrders = null;

    public function __construct(int $accountId, float $price, DateTime $date, string $status, $paymentConfirmation)
    {
        $this->accountId = $accountId;
        $this->price = $price;
        $this->date = $date;
        $this->status = $status;
        $this->paymentConfirmation = $paymentConfirmation;
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
     * Get the value of paymentConfirmation
     */
    public function getPaymentConfirmation()
    {
        return $this->paymentConfirmation;
    }

    /**
     * Set the value of paymentConfirmation
     *
     * @return  self
     */
    public function setPaymentConfirmation($paymentConfirmation)
    {
        $this->paymentConfirmation = $paymentConfirmation;

        return $this;
    }
}
