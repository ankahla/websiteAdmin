<?php
namespace websites\ManagementBundle\Entity\Repository;
use websites\ManagementBundle\Entity\Repository\AbstractRepository;
class dbsRepository extends AbstractRepository
{
    public Function search($search)
    {
    	$selectFields = array('a.id', 'concat(a.login, \' - \', a.db, \' - \', a.host) as label');
    	$searchFields = array('host', 'db', 'login');
    	return parent::abstractSearch($search, $selectFields, $searchFields, 'a.db');
    }
}