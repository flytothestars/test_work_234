<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;
use App\Config\Config;

$config = Config::db();

$pdo    = Database::connect(
    $config['host'],
    $config['port'],
    $config['name'],
    $config['user'],
    $config['password']
);

echo 'start migraion';
$pdo->exec(file_get_contents(__DIR__ . '/../schema.sql'));
