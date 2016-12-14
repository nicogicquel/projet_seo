<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Statut;

class LoadStatut implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		

		$noms=['200 OK','403 Forbidden','404 Not Found', '410 Gone', '500 Internal Server Error', '502 Proxy Error','503 Service Temporaly Unavailable','503 service Unavailable','The remote name could not be resolved','Unable to connect the remote server'];
		foreach ($noms as $nom) { 
			$statut = new Statut();
			$statut->setNom($nom);
			$manager->persist($statut);

		}
		$manager->flush();
	}

}