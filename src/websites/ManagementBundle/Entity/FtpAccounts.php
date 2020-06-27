<?php

namespace websites\ManagementBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * FtpAccounts
 */
class FtpAccounts
{
    /**
     * @var integer
     */
    private $idWebsite;

    /**
     * @var string
     */
    private $host;

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
     * @return FtpAccounts
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
     * Set host
     *
     * @param string $host
     *
     * @return FtpAccounts
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return FtpAccounts
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
     * @return FtpAccounts
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

