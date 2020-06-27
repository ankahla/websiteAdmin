<?php
namespace websites\ManagementBundle\Entity\Repository;
use websites\ManagementBundle\Entity\Repository\AbstractRepository;

class SocialAccRepository extends AbstractRepository
{

    public Function search($search)
    {
    	$selectFields = array('a.id', 'a.link');
    	$searchFields = array('link', 'login');
    	return parent::abstractSearch($search, $selectFields, $searchFields);
    }
}