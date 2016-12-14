<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Langue;

class LoadLangue implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		$listNom=array('FR', 'EN', 'DE', 'NL');
		

		foreach ($listNom as $nom) {
			$langue= new Langue();
			$langue->setNom($nom);
			$manager->persist($langue);
			}
		$manager->flush();
	}
}