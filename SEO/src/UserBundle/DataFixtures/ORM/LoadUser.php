<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		$listNames=array('Jérémy', 'Simon', 'Alexandre');
		$role=1;

		foreach ($listNames as $name) {
			$user=new User;
			$user->setUserName($name);
			$user->setPassword($name);
			$user->setSalt('');
			$user->setRole($role);
			$manager->persist($user);
			}
		$manager->flush();
	}
}