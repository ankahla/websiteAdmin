<?php

namespace websites\ManagementBundle\Entity;

/**
 * Website
 */
class Website
{
    /**
     * @var string
     */
    private $domain;

    /**
     * @var bool
     */
    private $online = true;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $cpanel;

    /**
     * @var string
     */
    private $cplogin;

    /**
     * @var string
     */
    private $cppass;

    /**
     * @var string
     */
    private $pop3;

    /**
     * @var string
     */
    private $smtp;

    /**
     * @var string
     */
    private $webmail;

    /**
     * @var string
     */
    private $dns1;

    /**
     * @var string
     */
    private $dns2;

    /**
     * @var string
     */
    private $billing;

    /**
     * @var string
     */
    private $billinglogin;

    /**
     * @var string
     */
    private $billingpass;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var \DateTime
     */
    private $updDate;

    /**
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return Website
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set online
     *
     * @param string $online
     *
     * @return Website
     */
    public function setOnline($online)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return bool
     */
    public function isOnline()
    {
        return $this->online;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Website
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set cpanel
     *
     * @param string $cpanel
     *
     * @return Website
     */
    public function setCpanel($cpanel)
    {
        $this->cpanel = $cpanel;

        return $this;
    }

    /**
     * Get cpanel
     *
     * @return string
     */
    public function getCpanel()
    {
        return $this->cpanel;
    }

    /**
     * Set cplogin
     *
     * @param string $cplogin
     *
     * @return Website
     */
    public function setCplogin($cplogin)
    {
        $this->cplogin = $cplogin;

        return $this;
    }

    /**
     * Get cplogin
     *
     * @return string
     */
    public function getCplogin()
    {
        return $this->cplogin;
    }

    /**
     * Set cppass
     *
     * @param string $cppass
     *
     * @return Website
     */
    public function setCppass($cppass)
    {
        $this->cppass = $cppass;

        return $this;
    }

    /**
     * Get cppass
     *
     * @return string
     */
    public function getCppass()
    {
        return $this->cppass;
    }

    /**
     * Set pop3
     *
     * @param string $pop3
     *
     * @return Website
     */
    public function setPop3($pop3)
    {
        $this->pop3 = $pop3;

        return $this;
    }

    /**
     * Get pop3
     *
     * @return string
     */
    public function getPop3()
    {
        return $this->pop3;
    }

    /**
     * Set smtp
     *
     * @param string $smtp
     *
     * @return Website
     */
    public function setSmtp($smtp)
    {
        $this->smtp = $smtp;

        return $this;
    }

    /**
     * Get smtp
     *
     * @return string
     */
    public function getSmtp()
    {
        return $this->smtp;
    }

    /**
     * Set webmail
     *
     * @param string $webmail
     *
     * @return Website
     */
    public function setWebmail($webmail)
    {
        $this->webmail = $webmail;

        return $this;
    }

    /**
     * Get webmail
     *
     * @return string
     */
    public function getWebmail()
    {
        return $this->webmail;
    }

    /**
     * Set dns1
     *
     * @param string $dns1
     *
     * @return Website
     */
    public function setDns1($dns1)
    {
        $this->dns1 = $dns1;

        return $this;
    }

    /**
     * Get dns1
     *
     * @return string
     */
    public function getDns1()
    {
        return $this->dns1;
    }

    /**
     * Set dns2
     *
     * @param string $dns2
     *
     * @return Website
     */
    public function setDns2($dns2)
    {
        $this->dns2 = $dns2;

        return $this;
    }

    /**
     * Get dns2
     *
     * @return string
     */
    public function getDns2()
    {
        return $this->dns2;
    }

    /**
     * Set billing
     *
     * @param string $billing
     *
     * @return Website
     */
    public function setBilling($billing)
    {
        $this->billing = $billing;

        return $this;
    }

    /**
     * Get billing
     *
     * @return string
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * Set billinglogin
     *
     * @param string $billinglogin
     *
     * @return Website
     */
    public function setBillinglogin($billinglogin)
    {
        $this->billinglogin = $billinglogin;

        return $this;
    }

    /**
     * Get billinglogin
     *
     * @return string
     */
    public function getBillinglogin()
    {
        return $this->billinglogin;
    }

    /**
     * Set billingpass
     *
     * @param string $billingpass
     *
     * @return Website
     */
    public function setBillingpass($billingpass)
    {
        $this->billingpass = $billingpass;

        return $this;
    }

    /**
     * Get billingpass
     *
     * @return string
     */
    public function getBillingpass()
    {
        return $this->billingpass;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Website
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return Website
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set updDate
     *
     * @param \DateTime $updDate
     *
     * @return Website
     */
    public function setUpdDate($updDate)
    {
        $this->updDate = $updDate;

        return $this;
    }

    /**
     * Get updDate
     *
     * @return \DateTime
     */
    public function getUpdDate()
    {
        return $this->updDate;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Website
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
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

