<?php

namespace CoreBundle\DataFixtures;

use CoreBundle\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $roles = array(
            Role::create()->setName('ROLE_USER'),
            Role::create()->setName('ROLE_API'),
            Role::create()->setName('ROLE_ADMIN'),
            Role::create()->setName('ROLE_DEV'),
            Role::create()->setName('ROLE_SUPER_ADMIN'),
        );

        foreach ($roles as $role) {
            $manager->persist(
                new Role($role)
            );
        }

        $manager->flush();
    }
}
