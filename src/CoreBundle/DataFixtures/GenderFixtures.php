<?php

namespace CoreBundle\DataFixtures;

use CoreBundle\Entity\Gender;
use CoreBundle\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenderFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $genders = array(
            Gender::create()->setName('MEN_GENDER'),
            Gender::create()->setName('WOMEN_GENDER'),
        );

        foreach ($genders as $gender) {
            $manager->persist(
                $gender
            );
        }

        $manager->flush();
    }
}
