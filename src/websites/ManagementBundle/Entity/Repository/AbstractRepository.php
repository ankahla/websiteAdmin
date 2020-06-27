<?php
namespace websites\ManagementBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;

class AbstractRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->findBy(array(), array('idWebsite' => 'DESC'));
    }

    public Function abstractSearch($search, $selectFields, $searchFields, $orderBy = '')
    {
        if (!$search || !$selectFields || !$searchFields) {
            return array();
        }
    	$words = explode(' ', $search);

    	$qb = $this->createQueryBuilder('a')
        ->select($selectFields);
        foreach ($searchFields as $f) {
        	foreach ($words as $word) {
        		$qb->orWhere($qb->expr()->like('a.'.$f, "'%$word%'"));
        	}
        }
        $orderBy = $orderBy ? $orderBy:end($selectFields);
        $qb->orderBy($orderBy, 'ASC');

        return $qb->getQuery()->getArrayResult();

    }
}