<?php
class Log
{
     // Instance Variable
     private ?int $id = null;
     private ?string $log = null;
     private ?DateTime $date = null;

     // Constructor
     public function __construct(string $log, DateTime $date)
     {
          $this->log = $log;
          $this->date = $date;
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
      * Get the value of log
      */
     public function getLog()
     {
          return $this->log;
     }

     /**
      * Set the value of log
      *
      * @return  self
      */
     public function setLog($log)
     {
          $this->log = $log;

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
}
