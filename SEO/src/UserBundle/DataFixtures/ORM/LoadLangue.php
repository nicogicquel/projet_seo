<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Langue;

class LoadUser implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		$listNom=array('FR', 'EN', 'DE', 'NL');
		

		foreach ($listNom as $name) {
			$langue=new Langue;
			$langue->setLangue($nom);
			$manager->persist($langue);
			}
		$manager->flush();
	}
}