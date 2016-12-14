<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Region;

class LoadRegion implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		

		$noms=['Auvergne-Rhône-Alpe','Bourgogne-Franche-Comté','Bretagne','Centre-Val de Loire','Corse','Grand-Est','Hauts-de-France','Île-de-France','Normandie','Nouvelle-Aquitaine','Occitanie','Pays-de-la-Loire','Provence-Alpes-Côte d\'azur','All'];
		foreach ($noms as $nom) { 
			$region = new Region();
			$region->setNom($nom);
			$manager->persist($region);

		}
		$manager->flush();
	}

}
