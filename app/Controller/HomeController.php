<?php

namespace App\Controller;

use App\Core\View;
use App\Repository\CategoryRepository;
use App\Repository\ArticleRepository;

class HomeController
{
    public function __construct(
        private View $view,
        private readonly CategoryRepository $categories,
        private readonly ArticleRepository $articles
    ){}

    public function index()
    {
        $blocks = [];

        foreach ($this->categories->allWithArticles() as $category) {
            $blocks[] = [
                'category' => $category,
                'articles' => $this->articles->latestByCategory((int) $category['id'], 3),
            ];
        }
        $this->view->render('home.tpl', ['title' => 'Hello World', 'blocks' => $blocks]);
    }
}