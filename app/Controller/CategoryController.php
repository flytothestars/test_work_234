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
        private readonly int $limitPage,
    ) {
    }

    public function show(int $id): void
    {
        $category = $this->categories->find($id);

        if ($category === null) {
            http_response_code(404);
            echo '404 — Category not found';
            return;
        }

        $sort = (string) ($_GET['sort'] ?? 'newest');
        if (!array_key_exists($sort, ArticleRepository::SORTS)) {
            $sort = 'newest';
        }

        $total      = $this->articles->countByCategory($id);
        $totalPages = max(1, (int) ceil($total / $this->limitPage));
        $page       = (int) ($_GET['page'] ?? 1);
        $page       = max(1, min($page, $totalPages));
        $offset     = ($page - 1) * $this->limitPage;

        $articles = $this->articles->byCategory($id, $sort, $this->limitPage, $offset);

        $this->view->render('category.tpl', [
            'page_title'  => $category['name'],
            'category'    => $category,
            'articles'    => $articles,
            'sort'        => $sort,
            'sorts'       => array_keys(ArticleRepository::SORTS),
            'page'        => $page,
            'total_pages' => $totalPages,
            'total'       => $total,
        ]);
    }
}
