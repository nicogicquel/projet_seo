<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Type;

class LoadType implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		

		$noms=['Activités alentours','Annuaire','Blog','Label','Officiel'];
		foreach ($noms as $nom) { 
			$Type = new Type();
			$Type->setNom($nom);
			$manager->persist($Type);

		}
		$manager->flush();
	}

}