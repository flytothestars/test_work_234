<?php 

namespace App\Controller;

use App\Core\View;
use App\Repository\ArticleRepository;

class ArticleController 
{
    public function __construct(
        private readonly View $view,
        private readonly ArticleRepository $articles,
    ) {
    }

    public function show(int $id): void
    {
        $article = $this->articles->find($id);

        if ($article === null) {
            http_response_code(404);
            echo '404 — Article not found';
            return;
        }

        $this->view->render('article.tpl', [
            'page_title' => $article['title'],
            'article'    => $article,
            'categories' => $this->articles->categoriesOf($id)
        ]);
    }
}