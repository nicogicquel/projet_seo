<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\Role;

class LoadRole implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		

		$name=['utilisateur','administrateur'];
		$role=['ROLE_USER', 'ROLE_ADMIN'];
		for ($i=0; $i < count($name); $i++) { 
			$roles[$i] = new Role();
			$roles[$i]->setName($name[$i]);
			$roles[$i]->setRole($role[$i]);
			$manager->persist($roles);

		}
		$manager->flush();
	}

}