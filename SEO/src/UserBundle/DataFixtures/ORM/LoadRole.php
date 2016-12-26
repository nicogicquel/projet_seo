<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\Role;

class LoadRole extends AbstractFixture implements OrderedFixtureInterface
{
	public function load (ObjectManager $manager)
	{

		$role_user = new Role();
        $role_user->setName('Utilisateur');
        $role_user->setRole('ROLE_USER');

        $role_admin = new Role();
        $role_admin->setName('Admin');
        $role_admin->setRole('ROLE_ADMIN');

        $manager->persist($role_user);
        $manager->persist($role_admin);
        $manager->flush();

        $this->addReference('admin-group', $role_admin);
        $this->addReference('user-group', $role_user);
	}

	public function getOrder()
    {
        return 1;
    }

}