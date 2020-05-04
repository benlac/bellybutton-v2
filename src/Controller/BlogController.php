<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentary;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findBy([], [
            'createdAt' => 'DESC',
        ]);
        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/blog/{id}", name="blog_show", methods={"GET"})
     */
    public function show(Article $article, Commentary $commentary)
    {

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'comment' => $commentary
        ]);
    }
}
