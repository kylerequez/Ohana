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
    private ?string $fname = null;
    private ?string $mname = null;
    private ?string $lname = null;
    private ?string $number = null;
    private ?string $email = null;

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

    /**
     * Get the value of listOfOrders
     */
    public function getListOfOrders()
    {
        return $this->listOfOrders;
    }

    /**
     * Set the value of listOfOrders
     *
     * @return  self
     */
    public function setListOfOrders($listOfOrders)
    {
        $this->listOfOrders = $listOfOrders;

        return $this;
    }

    /**
     * Get the value of fname
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set the value of fname
     *
     * @return  self
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get the value of mname
     */
    public function getMname()
    {
        return $this->mname;
    }

    /**
     * Set the value of mname
     *
     * @return  self
     */
    public function setMname($mname)
    {
        $this->mname = $mname;

        return $this;
    }

    /**
     * Get the value of lname
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set the value of lname
     *
     * @return  self
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

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

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
