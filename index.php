<?php

require __DIR__ . '/vendor/autoload.php';

use App\Config\Config;
use App\Core\Database;
use App\Controller\HomeController;
use App\Controller\ArticleController;
use App\Controller\CategoryController;
use App\Core\View;
use App\Repository\CategoryRepository;
use App\Repository\ArticleRepository;
use App\Core\Router;

$config = Config::db();

try {
    $db = Database::connect(
        $config['host'],
        $config['port'],
        $config['name'],
        $config['user'],
        $config['password']
    );
} catch (Throwable $e) {
    echo 'Ошибка базы данных: ' . $e->getMessage();
    exit;
}

$view = new View();
$categoryRepository = new CategoryRepository($db);
$articleRepository = new ArticleRepository($db);

$home = new HomeController($view, $categoryRepository, $articleRepository);
$category = new CategoryController($view, $categoryRepository, $articleRepository, Config::PAGINATION_LIMIT);
$article = new ArticleController($view, $articleRepository);

$router = new Router();
$router->set('/', static fn () => $home->index());
$router->set('/category/{id}', static fn (array $p) => $category->show((int) $p['id']));
$router->set('/article/{id}', static fn (array $p) => $article->show((int) $p['id']));

$router->dispatch($_SERVER['REQUEST_URI'] ?? '/');
