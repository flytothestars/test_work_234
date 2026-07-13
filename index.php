<?php

require __DIR__ . '/vendor/autoload.php';

use App\Config\Config;
use App\Core\Database;
use App\Controller\HomeController;
use App\Controller\ArticleController;
use App\Controller\CategoryController;
use Smarty\Smarty;
use App\Core\View;

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

$home = new HomeController($view);
$category = new CategoryController();
$article = new ArticleController();
$home->index($db);
