<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface
{
	public function load (ObjectManager $manager)
	{
		/*$listNames=array('Jérémy', 'Simon', 'Alexandre');
		$role='1';

		foreach ($listNames as $name) {
			$user=new User;
			$user->setUserName($name);
			$user->setPassword($name);
			$user->setSalt('');
			$user->setUserRoles($role);
			$manager->persist($this->getReference('admin-group'));
			}
		$manager->flush();

		$this->addReference('admin-user', $user);*/


        $userAdmin = new User();

        

        $userAdmin->setUsername('admin');
        $userAdmin->setPassword('admin');
        
        $userAdmin->setUserRoles($this->getReference('admin-group'));


        $manager->persist($userAdmin);
        $manager->flush();

        $this->addReference('admin-user', $userAdmin);
	}

	public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}