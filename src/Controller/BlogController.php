<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Entity\Article;
use App\Entity\Commentary;
use App\Form\CommentaryType;
use App\Repository\TagRepository;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository, TagRepository $tagRepository, PaginatorInterface $paginator, Request $request)
    {
        $articles = $articleRepository->findBy([ 'status' => true ], [
            'createdAt' => 'DESC',
        ]);
        $lastArticle = $articleRepository->findOneBy([ 'status' => true ],[
            'createdAt' => 'DESC'
        ]);
        $recentArticle = $articleRepository->findBy([ 'status' => true ], [
            'createdAt' => 'DESC'
        ], 3);
        $tags = $tagRepository->findAll();

        $pagination = $paginator->paginate(
            $articles, 
            $request->query->getInt('page', 1), 
            10 
        );
    dump($articles);
        return $this->render('blog/index.html.twig', [
            'articles' => $pagination,
            'lastArticle' => $lastArticle,
            'tags' => $tags,
            'pagination' => $pagination,
            'recentArticle' => $recentArticle,
        ]);
    }
    /**
     * @Route("/blog/{id}", name="blog_show", methods={"GET", "POST"})
     */
    public function show(Article $article, TagRepository $tagRepository, Request $request, EntityManagerInterface $em)
    {
        $tags = $tagRepository->findAll();
        $commentary = new Commentary();
        $form = $this->createForm(CommentaryType::class, $commentary);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
            $commentary->setArticle($article);
            $em->persist($commentary);
            $em->flush();

            return $this->redirectToRoute('blog_show', ['id' => $article->getId()] );
        }

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'tags' => $tags,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/blog/tag/{id}", name="blog_show_tag", methods={"GET"})
     */
    public function showByTag(ArticleRepository $articleRepository, Tag $tag, TagRepository $tagRepository, PaginatorInterface $paginator, Request $request)
    {
        $articles = $articleRepository->findByTag($tag);
        $tags = $tagRepository->findAll();

        $pagination = $paginator->paginate(
            $articles, 
            $request->query->getInt('page', 1), 
            10
        );

        return $this->render('blog/list_tag.html.twig', [
            'articles' => $pagination,
            'tags' => $tags,
            'pagination' => $pagination
        ]);
    }
}
