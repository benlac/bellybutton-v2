<?php

namespace App\Command;

use App\Entity\Comment;
use App\Entity\Like;
use App\Entity\View;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\CampaignRepository;
use DateTime;

class GetStatSupport extends Command
{
    protected static $defaultName = 'app:fetch-stat';

    private $campaignRepository;

    private $em;

    public function __construct(CampaignRepository $campaignRepository, EntityManagerInterface $em)
    {
        $this->campaignRepository = $campaignRepository;
        $this->em = $em;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Get campaign stats')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $campaigns = $this->campaignRepository->findBy(['status' => true]);

        foreach ($campaigns as $campaign) {
          $supports = $campaign->getSupports();
          foreach($supports as $support) {
            $video = $support->getIdVideo();
            $reponseApi = $this->getStatFromApi($video);
            $items = $reponseApi->items;

            foreach($items as $stat) {
              // Je récupère le nombre de like de chaque vidéo et le stock en bdd au support lié
              $likes = $stat->statistics->likeCount;
              $newLike = new Like();
              $newLike->setNumber($likes);
              $newLike->setSupport($support);
              $newLike->setCreatedAt(new \DateTime());
              $this->em->persist($newLike);
              $supportLike = $support->addLike($newLike);
              $this->em->persist($supportLike);

              // Je récupère le nombre de commentaire de chaque vidéo et le stock en bdd au support lié
              $comments = $stat->statistics->commentCount;
              $newComment = new Comment();
              $newComment->setNumber($comments);
              $newComment->setSupport($support);
              $newComment->setCreatedAt(new \DateTime());
              $this->em->persist($newComment);
              $supportComment = $support->addComment($newComment);
              $this->em->persist($supportComment);

              // Je récupère le nombre de vues de chaque vidéo et le stock en bdd au support lié
              $views = $stat->statistics->viewCount;
              $newView = new View();
              $newView->setNumber($views);
              $newView->setSupport($support);
              $newView->setCreatedAt(new \DateTime());
              $this->em->persist($newView);
              $supportView = $support->addView($newView);
              $this->em->persist($supportView);
            }
          }
        }
        $this->em->flush();

        $io->success('Stat récuperer');
        return 0;
    }

    public function getStatFromApi($idVideo)
    {
      $apiKey = 'AIzaSyAUkCjkYzeoyjOmjv2D2tp_ZXblAQ3oAis';
      $url = 'https://www.googleapis.com/youtube/v3/videos?id='.$idVideo.'&key='.$apiKey.'&part=statistics';

      $responseContent = file_get_contents($url);

      $json = json_decode($responseContent);

      return $json;
    }
}
