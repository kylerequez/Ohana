<?php
class ChatbotInformation implements JsonSerializable
{
    private ?int $id = null;
    private $avatar = null;
    private ?string $name = null;
    private ?string $introduction = null;
    private ?string $noResponse = null;


    public function __construct(string $avatar, string $name, $introduction, $noResponse)
    {
        $this->avatar = $avatar;
        $this->name = $name;
        $this->introduction = $introduction;
        $this->noResponse = $noResponse;
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

    /**
     * Get the value of avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }
}
