<?php

namespace CoreBundle\DataFixtures;

use CoreBundle\Entity\TokenType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TokenTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tokenTypes = array(
            TokenType::create()->setName('API_ACCESS_TOKEN')->setValidityPeriod(null),

            TokenType::create()->setName('UID_TOKEN')->setValidityPeriod(null),
            TokenType::create()->setName('OID_TOKEN')->setValidityPeriod(null),

            TokenType::create()->setName('RESET_PASSWORD_TOKEN')->setValidityPeriod(
                new \DateInterval("P1H")
            ),
            TokenType::create()->setName('VALIDATE_EMAIL_TOKEN')->setValidityPeriod(null),
        );

        foreach ($tokenTypes as $tokenType) {
            $manager->persist(
                $tokenType
            );
        }

        $manager->flush();
    }
}
