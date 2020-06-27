<?php
namespace websites\ManagementBundle\Entity\Repository;
use websites\ManagementBundle\Entity\Repository\AbstractRepository;

class CmsRepository extends AbstractRepository
{

    public Function search($search)
    {
    	$selectFields = array('a.id', 'a.adminUrl');
    	$searchFields = array('login', 'adminUrl');
    	return parent::abstractSearch($search, $selectFields, $searchFields);
    }
}