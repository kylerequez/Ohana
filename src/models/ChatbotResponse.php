<?php
class ChatbotResponse
{
    private ?int $id = null;
    private ?string $response = null;
    private ?string $query = null;
    private ?int $timesAsked = null;

    public function __construct(?string $response, string $query, int $timesAsked)
    {
        $this->response = $response;
        $this->query = $query;
        $this->timesAsked = $timesAsked;
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
     * Get the value of response
     */ 
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the value of response
     *
     * @return  self
     */ 
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get the value of query
     */ 
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set the value of query
     *
     * @return  self
     */ 
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get the value of timesAsked
     */ 
    public function getTimesAsked()
    {
        return $this->timesAsked;
    }

    /**
     * Set the value of timesAsked
     *
     * @return  self
     */ 
    public function setTimesAsked($timesAsked)
    {
        $this->timesAsked = $timesAsked;

        return $this;
    }
}