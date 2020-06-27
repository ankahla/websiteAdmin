<?php

namespace websites\ManagementBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 *
 * @ORM\Table(name="dbs")
 * @ORM\Entity
 */
class dbs
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
    private $db;

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
     * @return dbs
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
     * @return dbs
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
     * Set db
     *
     * @param string $db
     *
     * @return dbs
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    /**
     * Get db
     *
     * @return string
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return dbs
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
     * @return dbs
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

