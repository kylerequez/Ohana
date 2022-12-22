<?php
class Account
{
    // Instance Variable
    private ?int $id = null;
    private ?string $type = null;
    private ?string $fname = null;
    private ?string $mname = null;
    private ?string $lname = null;
    private ?string $number = null;
    private ?string $email = null;
    private ?string $status = null;
    private ?string $password = null;

    // Constructor
    public function __construct(?string $type, ?string $fname, ?string $mname, ?string $lname, ?string $number, ?string $email, ?string $status, ?string $password)
    {
        $this->type = $type;
        $this->fname = $this->capitalizeName($fname);
        $this->mname = $this->capitalizeName($mname);
        $this->lname = $this->capitalizeName($lname);
        $this->number = $number;
        $this->email = $email;
        $this->status = $status;
        $this->password = $password;
    }

    // Getters and Setters
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
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;
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
        $this->fname = $this->capitalizeName($fname);
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
        $this->mname = $this->capitalizeName($mname);
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
        $this->lname = $this->capitalizeName($lname);
        return $this;
    }

    /**
     * Splits the string into arrays based on whitespaces
     * then converts it into string forming a name
     * 
     * Ex. John jemuel
     * Output. John Jemuel
     */
    private function capitalizeName($name)
    {
        $name = preg_split("/[\s,]+/", $name);
        $name = array_map('strtolower', $name);
        $name = array_map('ucfirst', $name);
        $name = implode(" ", $name);
        return $name;
    }

    /**
     * Get the value of Fname, Mname, and Lname
     */
    public function getFullName()
    {
        if(!empty($this->mname)){
            return $this->fname . " " . substr($this->mname, 0, 1) . ". " . $this->lname;
        } else {
            return $this->fname . " " . $this->lname;
        }
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
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}