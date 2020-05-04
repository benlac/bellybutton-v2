<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentary;
use App\Repository\ArticleRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository, TagRepository $tagRepository)
    {
        $articles = $articleRepository->findBy([], [
            'createdAt' => 'DESC',
        ]);
        $tags = $tagRepository->findAll();
        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }
    /**
     * @Route("/blog/{id}", name="blog_show", methods={"GET"})
     */
    public function show(Article $article, Commentary $commentary, TagRepository $tagRepository)
    {
        $tags = $tagRepository->findAll();

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'comment' => $commentary,
            'tags' => $tags,
        ]);
    }
}
