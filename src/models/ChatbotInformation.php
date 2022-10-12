<?php
class ChatbotInformation
{
    private ?int $id = null;
    private $blob = null;
    private ?string $name = null;
    private ?string $introduction = null;
    private ?string $noResponse = null;


    public function __construct($blob, string $name, $introduction, $noResponse)
    {
        $this->blob = $blob;
        $this->name = $name;
        $this->introduction = $introduction;
        $this->noResponse = $noResponse;
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
     * Get the value of blob
     */
    public function getBlob()
    {
        return $this->blob;
    }

    /**
     * Set the value of blob
     *
     * @return  self
     */
    public function setBlob($blob)
    {
        $this->blob = $blob;

        return $this;
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
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of introduction
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * Set the value of introduction
     *
     * @return  self
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;

        return $this;
    }

    /**
     * Get the value of noResponse
     */
    public function getNoResponse()
    {
        return $this->noResponse;
    }

    /**
     * Set the value of noResponse
     *
     * @return  self
     */
    public function setNoResponse($noResponse)
    {
        $this->noResponse = $noResponse;

        return $this;
    }
}
