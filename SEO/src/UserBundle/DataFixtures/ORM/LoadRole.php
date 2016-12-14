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
		

		/*$name=['utilisateur','administrateur'];
		$role=['ROLE_USER', 'ROLE_ADMIN'];
		for ($i=0; $i < count($name); $i++) { 
			$roles[$i] = new Role();
			$roles[$i]->setName($name[$i]);
			$roles[$i]->setRole($role[$i]);
			$manager->persist($roles);

		}
		$manager->flush();*/

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
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}