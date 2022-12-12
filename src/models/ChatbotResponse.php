<?php
class ChatbotResponse
{
    private ?int $id = null;
    private ?string $response = null;
    private ?string $query = null;

    public function __construct(?string $response, string $query)
    {
        $this->response = $response;
        $this->query = $query;
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
}
