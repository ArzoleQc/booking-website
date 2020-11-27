<?php

namespace CoreBundle\DataFixtures;

use CoreBundle\Entity\Gender;
use CoreBundle\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $countries = array(

        );

        foreach ($countries as $country) {
            $manager->persist(
                $country
            );
        }

        $manager->flush();
    }
}
