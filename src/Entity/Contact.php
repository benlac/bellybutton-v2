<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @var string
     * @Assert\Length(min = 2, max = 100)
     */
    private $fullname;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @var string|null
     * @Assert\Length(min = 2, max = 100)
     */
    private $company;

    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min = 10)
     */
    private $message;

    /**
     * Get the value of fullname
     *
     * @return  string
     */ 
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set the value of fullname
     *
     * @param  string  $fullname
     *
     * @return  self
     */ 
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of company
     *
     * @return  string|null
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @param  string|null  $company
     *
     * @return  self
     */ 
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of message
     *
     * @return  string|null
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param  string|null  $message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}