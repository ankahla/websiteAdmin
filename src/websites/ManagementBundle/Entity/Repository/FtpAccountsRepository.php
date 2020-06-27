<?php
namespace websites\ManagementBundle\Entity\Repository;
use websites\ManagementBundle\Entity\Repository\AbstractRepository;

class FtpAccountsRepository extends AbstractRepository
{

    public Function search($search)
    {
    	$selectFields = array('a.id', 'concat(a.login, \' @ \', a.host) as label');
    	$searchFields = array('login', 'host');
    	return parent::abstractSearch($search, $selectFields, $searchFields, 'a.login');
    }
}