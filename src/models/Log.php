<?php
class Log
{
     // Instance Variable
     private ?int $id = null;
     private ?string $log = null;
     private ?int $accountId = null;
     private ?string $accountType = null;
     private ?DateTime $date = null;

     // Constructor
     public function __construct(string $log, $accountId, $accountType, DateTime $date)
     {
          $this->log = $log;
          $this->accountId = $accountId;
          $this->accountType = $accountType;
          $this->date = $date;
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
      * Get the value of log
      */
     public function getLog(): ?string
     {
          return $this->log;
     }

     /**
      * Set the value of log
      */
     public function setLog(?string $log): self
     {
          $this->log = $log;

          return $this;
     }

     /**
      * Get the value of accountId
      */
     public function getAccountId(): ?string
     {
          return $this->accountId;
     }

     /**
      * Set the value of accountId
      */
     public function setAccountId(?string $accountId): self
     {
          $this->accountId = $accountId;

          return $this;
     }

     /**
      * Get the value of accountType
      */
     public function getAccountType(): ?string
     {
          return $this->accountType;
     }

     /**
      * Set the value of accountType
      */
     public function setAccountType(?string $accountType): self
     {
          $this->accountType = $accountType;

          return $this;
     }

     /**
      * Get the value of date
      */
     public function getDate(): ?DateTime
     {
          return $this->date;
     }

     /**
      * Set the value of date
      */
     public function setDate(?DateTime $date): self
     {
          $this->date = $date;

          return $this;
     }
}
