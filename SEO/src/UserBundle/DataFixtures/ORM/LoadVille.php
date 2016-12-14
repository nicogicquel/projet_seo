<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Ville;

class LoadVille implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		

		$noms=['Les Sables d\'Olonne','La Baule','Saint Tropez','Saint Jean de Luz','Fréjus','Sainte Maxime','Saint Jean de Mont','Biscarrosse','Biarritz','Saint Malo','La Rochelle','Argelès sur Mer','Calvi','Lavandou','Saintes Maries de la mer','Porto Vechio','Saint Raphaël','Cannes','Cap d\'Agde','Arcachon','Ajaccio','Annecy','Bordeaux','Gascogne','Noirmoutier','Pornic','Pornichet','Toulouse','Villes du Sud','Bretagne SUD','All'];
		foreach ($noms as $nom) { 
			$ville = new Ville();
			$ville->setNom($nom);
			$manager->persist($ville);

		}
		$manager->flush();
	}

}