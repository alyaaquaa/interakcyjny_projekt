<?php

/**
 * Article controller.
 */

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class ArticleController.
 */
#[Route('/article')]
class ArticleController extends AbstractController
{
    /**
     * Index action.
     *
     * @param ArticleRepository $articleRepository Article repository
     *
     * @return Response HTTP response
     */
    #[Route(
        name:
        'article_index',
        methods: 'GET'
    )]

    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

        return $this->render(
            'article/index.html.twig',
            ['articles' => $articles]
        );
    }

    /**
     * Show action.
     *
     * @param Article $article Article entity
     *
     * @return Response HTTP response
     */
    #[Route(
        '/{id}',
        name: 'article_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: 'GET'
    )]

    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', ['article' => $article]);
    }
}
