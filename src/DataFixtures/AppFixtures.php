<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\BellybuttonProvider;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $faker->addProvider(new BellybuttonProvider($faker));
        $faker->seed('hasard');

        //Role
        $adminRole = new Role();
        $adminRole->setName('ROLE_ADMIN');
        $adminRole->setLabel('Administrateur');
        $manager->persist($adminRole);

        $userRole = new Role();
        $userRole->setName('ROLE_USER');
        $userRole->setLabel('Utilisateur');
        $manager->persist($userRole);

        $influencerRole = new Role();
        $influencerRole->setName('ROLE_INFLUENCER');
        $influencerRole->setLabel('Influenceur');
        $manager->persist($influencerRole);

        $businessRole = new Role();
        $businessRole->setName('ROLE_BUSINESS');
        $businessRole->setLabel('Société');
        $manager->persist($businessRole);

        //Tag
        $tagLists = [];
        for($i = 0; $i < 10; $i++){
            $tag = new Tag();
            $tag->setName($faker->unique()->bellybuttonTag());
            $manager->persist($tag);
            $tagLists = $tag;
        }
        


        $manager->flush();
    }
}
