<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Core\View;

class CategoryController
{
    public function __construct(
        private readonly View $view,
        private readonly CategoryRepository $categories,
        private readonly ArticleRepository $articles,
    ) {
    }

    public function show(int $id): void
    {
        print_r($id);
        $category = $this->categories->find($id);

        if ($category === null) {
            http_response_code(404);
            echo '404 — Category not found';
            return;
        }

        $articles = $this->articles->byCategory($id);

        $this->view->render('category.tpl', [
            'page_title'  => $category['name'],
            'category'    => $category,
            'articles'    => $articles,
        ]);
    }
}
