<?php
namespace websites\ManagementBundle\Entity\Repository;
use websites\ManagementBundle\Entity\Repository\AbstractRepository;
class WebsiteRepository extends AbstractRepository
{
	public function findAll()
    {
        return $this->findBy(array(), array('id' => 'DESC'));
    }
    public Function search($search)
    {
    	$selectFields = array('a.id', 'a.domain', 'a.cpanel', 'a.notes');
    	$searchFields = array('domain', 'notes', 'cplogin');
    	return parent::abstractSearch($search, $selectFields, $searchFields);
    }
}