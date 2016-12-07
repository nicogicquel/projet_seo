<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Region;

class LoadRegion implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		

		$region=['Auvergne-Rhône-Alpe','Bourgogne-Franche-Comté','Bretagne','Centre-Val de Loire','Corse','Grand-Est','Hauts-de-France','Île-de-France','Normandie','Nouvelle-Aquitaine','Occitanie','Pays-de-la-Loire','Provence-Alpes-Côte d\'azur'];
		for ($i=0; $i < count($region); $i++) { 
			$roles[$i] = new Role();
			$roles[$i]->setRegion_id($name[$i]);
			$roles[$i]->setRegion($role[$i]);
			$manager->persist($roles);

		}
		$manager->flush();
	}

}
