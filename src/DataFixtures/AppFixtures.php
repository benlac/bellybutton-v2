<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\BellybuttonProvider;
use App\Entity\Article;
use App\Entity\Commentary;
use App\Entity\User;
use Doctrine\DBAL\Connection;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, Connection $connection)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->truncate($connection);
    }
    public function truncate(Connection $connection)
    {
        // Désactive la vérification des contraintes FK
        $connection->query('SET foreign_key_checks = 0');
        // On tronque
        $connection->query('TRUNCATE article');
        $connection->query('TRUNCATE article_tag');
        $connection->query('TRUNCATE tag');
        $connection->query('TRUNCATE user_role');
        $connection->query('TRUNCATE role');
        $connection->query('TRUNCATE user');
        $connection->query('TRUNCATE article_user');
        $connection->query('TRUNCATE commentary');
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
        
        //User
        $influencerLists = [];
        for($i = 0; $i < 10; $i++){
            $influencer = new User();
            $pseudo = $faker->unique()->firstName();
            $influencer->setEmail($faker->unique()->freeEmail);
            $influencer->setFirstname($pseudo);
            $influencer->setLastname($faker->unique()->lastName);
            $influencer->setPassword($this->passwordEncoder->encodePassword($influencer, 'influencer'));
            $influencer->setIdFacebook($pseudo);
            $influencer->setIdInstagram($pseudo);
            $influencer->setIdSnapchat($pseudo);
            $influencer->setIdTiktok($pseudo);
            $influencer->setIdYoutube($pseudo);
            $influencer->addUserRole($influencerRole);
            $manager->persist($influencer);
            $influencerLists[] = $influencer;
        }

        $businessLists = [];
        for($i = 0; $i < 10; $i++){
            $business = new User();
            $pseudo = $faker->unique()->firstName();
            $business->setEmail($faker->unique()->freeEmail);
            $business->setFirstname($pseudo);
            $business->setLastname($faker->unique()->lastName);
            $business->setPassword($this->passwordEncoder->encodePassword($business, 'business'));
            $business->addUserRole($businessRole);
            $manager->persist($business);
            $businessLists[] = $business;
        }

        $adminLists = [];
        for($i = 0; $i < 10; $i++){
            $admin = new User();
            $pseudo = $faker->unique()->firstName();
            $admin->setEmail($faker->unique()->freeEmail);
            $admin->setFirstname($pseudo);
            $admin->setLastname($faker->unique()->lastName);
            $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'));
            $admin->addUserRole($adminRole);
            $manager->persist($admin);
            $adminLists[] = $admin;
        }

        //Tag
        $tagLists = [];
        for($i = 0; $i < 10; $i++){
            $tag = new Tag();
            $tag->setName($faker->unique()->bellybuttonTag());
            $manager->persist($tag);
            $tagLists[] = $tag;
        }
        //Articles
        $articlesList = [];
        for($i = 0; $i < 20; $i++){
            $article = new Article();
            $article->setTitle($faker->unique()->realText($maxNbChars = 15));
            $article->setSubtitle($faker->unique()->realText($maxNbChars = 10));
            $article->setImage($faker->imageUrl($width = 640, $height = 480));
            $article->setBody($faker->unique()->realText($maxNbChars = 200));
            $article->addTag($tagLists[array_rand($tagLists)]);
            $article->addUser($adminLists[array_rand($adminLists)]);
            $manager->persist($article);
            $articlesList[] = $article;
        }
        //Commentary
        $commentariesLists = [];
        for($i = 0; $i < 10; $i++){
            $commentary = new Commentary();
            $commentary->setUsername($faker->unique()->firstName());
            $commentary->setBody($faker->unique()->realText($maxNbChars = 50));
            $commentary->setArticle($articlesList[array_rand($articlesList)]);
            $manager->persist($commentary);
            $commentariesLists[] = $commentary;
        }


        $manager->flush();
    }
}
