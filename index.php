<?php

require __DIR__ . '/vendor/autoload.php';

use App\Config\Config;
use App\Core\Database;
use App\Controller\HomeController;

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
$home->index($db);
