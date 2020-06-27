<?php

namespace websites\ManagementBundle\Entity;

/**
 * SocialAcc
 */
class SocialAcc
{
    /**
     * @var integer
     */
    private $idWebsite;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $passwd;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idWebsite
     *
     * @param integer $idWebsite
     *
     * @return SocialAcc
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
     * Set link
     *
     * @param string $link
     *
     * @return SocialAcc
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return SocialAcc
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
     * Set passwd
     *
     * @param string $passwd
     *
     * @return SocialAcc
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get passwd
     *
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
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

