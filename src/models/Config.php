<?php
class Config
{
    private ?string $name = null;
    private ?string $information = null;

    public function __construct(?string $name, string $information)
    {
        $this->name = $name;
        $this->information = $information;
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
     * Get the value of information
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set the value of information
     *
     * @return  self
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }
}
