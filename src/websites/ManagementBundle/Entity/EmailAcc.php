<?php

namespace websites\ManagementBundle\Entity;

/**
 * EmailAcc
 */
class EmailAcc
{
    /**
     * @var integer
     */
    private $idWebsite;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idWebsite
     *
     * @param integer $idWebsite
     *
     * @return EmailAcc
     */
    public function setIdWebsite($idWebsite)
    {
        $this->idWebsite = $idWebsite;

        return $this;
    }

    /**
     * Get idWebsite
     *
     * @return integer
     */
    public function getIdWebsite()
    {
        return $this->idWebsite;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return EmailAcc
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return EmailAcc
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

