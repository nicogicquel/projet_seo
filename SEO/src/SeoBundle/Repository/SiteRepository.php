<?php

namespace SeoBundle\Repository;

/**
 * SiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SiteRepository extends \Doctrine\ORM\EntityRepository
{

	public function findSite($region)
	{
	  /*$qb = $this->createQueryBuilder('s');

	  $qb->where('s.region = :region_id')
	       ->setParameter('region_id', $region);

	  return $qb
	    ->getQuery()
	    ->getResult()
	  ;*/

	 return $this->createQueryBuilder('s')
			->where('s.region = :region_id')
	       	->setParameter('region_id', $region)
	    	->getQuery()
	    	->getResult()
	  ;
	}
}
