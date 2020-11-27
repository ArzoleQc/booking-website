<?php

namespace CoreBundle\DataFixtures;

use CoreBundle\Entity\Gender;
use CoreBundle\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PhoneTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $genders = array(
            Gender::create()->setName('RESIDENTIAL_TYPE'),
            Gender::create()->setName('BUSINESS_TYPE'),
            Gender::create()->setName('MOBILE_TYPE'),
        );

        foreach ($genders as $gender) {
            $manager->persist(
                $gender
            );
        }

        $manager->flush();
    }
}
