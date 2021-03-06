<?php

namespace SeoBundle\Repository;

/**
 * DepartementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DepartementRepository extends \Doctrine\ORM\EntityRepository
{
	public function findDep($region)    
	{
	return $this->createQueryBuilder('d')      
            ->where('d.region= :region')
            ->setParameter('region', $region)
 			->getQuery()
          	->getArrayResult();
	}
}
