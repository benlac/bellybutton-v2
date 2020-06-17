<?php

namespace App\Controller\Api;

use App\Entity\Article;
use App\Entity\Commentary;
use App\Service\DateFormatter;
use App\Repository\CommentaryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogApiController extends AbstractController
{
    /**
     * @Route("/blog/api/comments/{id<\d+>}", name="blog_api_comments", methods={"GET"})
     */
    public function list(CommentaryRepository $commentaryRepository, Article $article, Request $request)
    { 
      $comments = $commentaryRepository->findBy(['article' => $article], ['createdAt' => 'DESC']);

      foreach($comments as $comment){
        DateFormatter::format($comment, ['createdAt']);
      };

      return $this->json($comments, Response::HTTP_OK, [], ['groups' => 'comments_show']);
    }
    /**
     * @Route("/blog/api/article/{id<\d+>}", name="blog_api_post", methods={"POST"})
     */
    public function addComment(Article $article, SerializerInterface $serializer, Request $request, EntityManagerInterface $em)
    {
      $comment = $serializer->deserialize($request->getContent(), Commentary::class, 'json');
      $comment->setArticle($article);

      $em->persist($comment);
      $em->flush();
      
      return $this->json(['message' => 'Message envoyé'], Response::HTTP_OK);

    }
}
