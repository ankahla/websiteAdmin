<?php

namespace websites\ManagementBundle\Entity;

/**
 * Cms
 */
class Cms
{
    /**
     * @var integer
     */
    private $idWebsite;

    /**
     * @var string
     */
    private $adminUrl;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idWebsite
     *
     * @param integer $idWebsite
     *
     * @return Cms
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
     * Set adminUrl
     *
     * @param string $adminUrl
     *
     * @return Cms
     */
    public function setAdminUrl($adminUrl)
    {
        $this->adminUrl = $adminUrl;

        return $this;
    }

    /**
     * Get adminUrl
     *
     * @return string
     */
    public function getAdminUrl()
    {
        return $this->adminUrl;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Cms
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Cms
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Cms
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
     * Set contact
     *
     * @param string $contact
     *
     * @return Cms
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
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

