<?php

namespace CoreBundle\DataFixtures;

use CoreBundle\Entity\CredentialType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CredentialTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $credentialTypes = array(
            CredentialType::create()->setName('PHONE_CREDENTIAL'),
            CredentialType::create()->setName('EMAIL_CREDENTIAL'),
            CredentialType::create()->setName('PSEUDO_CREDENTIAL'),
            CredentialType::create()->setName('FACEBOOK_OAUTH_CREDENTIAL'),
            CredentialType::create()->setName('GOOGLE_OAUTH_CREDENTIAL'),
        );

        foreach ($credentialTypes as $credentialType) {
            $manager->persist(
                $credentialType
            );
        }

        $manager->flush();
    }
}
