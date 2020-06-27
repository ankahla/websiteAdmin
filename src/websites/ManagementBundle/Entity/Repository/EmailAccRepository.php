<?php
namespace websites\ManagementBundle\Entity\Repository;
use websites\ManagementBundle\Entity\Repository\AbstractRepository;
class EmailAccRepository extends AbstractRepository
{
    public function findAll()
    {
    	$query = $this->createQueryBuilder('e')
        ->select('e.id, e.idWebsite, e.email, e.password, w.webmail')
        ->leftJoin('websitesManagementBundle:Website w','with w.id =  e.idWebsite')
        ->orderBy('w.id', 'DESC')
        ->getQuery();
        return $query->getArrayResult();
    }

    public Function search($search)
    {
    	$selectFields = array('a.id', 'a.email');
    	$searchFields = array('email');
    	return parent::abstractSearch($search, $selectFields, $searchFields);
    }
}