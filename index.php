<?php

require __DIR__ . '/vendor/autoload.php';

use App\Config\Config;
use App\Core\Database;
use App\Controller\HomeController;
use App\Controller\ArticleController;
use App\Controller\CategoryController;
use Smarty\Smarty;


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

$home = new HomeController();
$category = new CategoryController();
$article = new ArticleController();
$home->index($db);

$templateDir = __DIR__ . '/view/';
$templateCompileDir = __DIR__ . '/view_c/';
$configDir = __DIR__ . '/config/';
$cacheDir = __DIR__ . '/cache/';

$smarty = new Smarty();
$smarty->setTemplateDir($templateDir);
$smarty->setCompileDir($templateCompileDir);
$smarty->setConfigDir($configDir);
$smarty->setCacheDir($cacheDir);

$smarty->assign('title', 'Hello World');
$smarty->display('home.tpl');