<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Tag;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\View;
use App\Entity\Article;
use App\Entity\Support;
use App\Entity\Campaign;
use App\Entity\Commentary;
use Doctrine\DBAL\Connection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\BellybuttonProvider;
use App\Entity\Comment;
use App\Entity\Like;
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
        $connection->query('TRUNCATE campaign');
        $connection->query('TRUNCATE campaign_user');
        $connection->query('TRUNCATE support');
        $connection->query('TRUNCATE view');
        $connection->query('TRUNCATE comment');
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
        for($i = 0; $i < 30; $i++){
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
        // Admin
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
        for($i = 1; $i < 31; $i++){
            $article = new Article();
            $article->setTitle($faker->unique()->realText($maxNbChars = 80));
            $article->setSubtitle($faker->unique()->realText($maxNbChars = 60));
            $article->setImage($i . '.jpeg');
            $article->setBody($faker->unique()->realText($maxNbChars = 2000));
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


        // Campaign
        $campaignList = [];
        for($i = 0; $i < 30; $i++){
            $campaign = new Campaign();
            $campaign->setName($faker->unique()->bellybuttonCampaign());
            $campaign->setPrice(random_int(1000, 50000));
            $campaign->setViewGoal(random_int(100000, 1000000));
            $campaign->setView(random_int(0, 1000000));
            $campaign->setNbLike(random_int(0, 9000));
            $campaign->setNbComment(random_int(0, 9000));
            $campaign->setTotalImpression($campaign->getNbComment() + $campaign->getNbLike() + $campaign->getView());
            $campaign->setCostPerThousand(random_int(0, 9000));
            $campaign->setEngagementRate($campaign->getNbLike() + $campaign->getNbLike() / $campaign->getView());
            $date = new DateTime();
            $date = $date->modify('+'.$i.' month');
            $campaign->setFinishAt($date);
            $manager->persist($campaign);
            $campaignList[] = $campaign;
        }

        // Support
        $supportList = [];
        for($i = 0; $i < 30; $i++){
            $support = new Support();
            $support->setName($faker->bellybuttonSupport());
            $support->setIdVideo($faker->bellybuttonVideo());
            $support->setNetwork('Youtube');
            for($j = 0; $j < 4; $j++){
                $support->setCampaign($campaignList[array_rand($campaignList)]);
            }
            $manager->persist($support);
            $supportList[] = $support;
        }
        
        // user business
        $businessLists = [];
        for($i = 0; $i < 5; $i++){
            $business = new User();
            $pseudo = $faker->unique()->firstName();
            $business->setEmail($faker->unique()->freeEmail);
            $business->setFirstname($pseudo);
            $business->setLastname($faker->unique()->lastName);
            $business->setPassword($this->passwordEncoder->encodePassword($business, 'business'));
            $business->addUserRole($businessRole);
            for($j = 0; $j < 6; $j++){
                //@TODO rendre unique une campagne
                $business->addCampaign($campaignList[array_rand($campaignList)]);
            }
            $manager->persist($business);
            $businessLists[] = $business;
        }
        
        // Vues
        $viewList = [];
        for($i = 0; $i < 10; $i++){
            $view = new View();
            $view->setNumber($faker->numberBetween($min = 0, $max = 9000));
            $date = new DateTime();
            $date = $date->modify('+'.$i.' day');
            $view->setCreatedAt($date);
            $view->setSupport($supportList[$i]);
            $manager->persist($view);
            $viewList[] = $view;
        }

         // Like
        $likeList = [];
         for($i = 0; $i < 10; $i++){
            $like = new Like();
            $like->setNumber($faker->numberBetween($min = 0, $max = 9000));
            $date = new DateTime();
            $date = $date->modify('+'.$i.' day');
            $like->setCreatedAt($date);
            $like->setSupport($supportList[$i]);
            $manager->persist($like);
            $likeList[] = $like;
        }

         // Comment
        $commentList = [];
         for($i = 0; $i < 10; $i++){
            $comment = new Comment();
            $comment->setNumber(random_int(0, 9000));
            $date = new DateTime();
            $date = $date->modify('+'.$i.' day');
            $comment->setCreatedAt($date);
            $comment->setSupport($supportList[$i]);
            $manager->persist($comment);
            $commentList[] = $comment;
        }


        $manager->flush();
    }
}
