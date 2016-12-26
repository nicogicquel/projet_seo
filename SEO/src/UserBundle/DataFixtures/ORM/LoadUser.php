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
        return 2;
    }
}