<?php

class Feedback
{
    // Instance Variable
    private ?int $id = null;
    private ?int $accountId = null;
    private ?int $rating = null;
    private ?string $message = null;

    public function __construct(int $accountId, int $rating, string $message)
    {
        $this->accountId = $accountId;
        $this->rating = $rating;
        $this->message = $message;
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
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}