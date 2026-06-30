<?php

require __DIR__ . '/vendor/autoload.php';

use App\Config\Config;
use App\Core\Database;

$config = Config::db();

$db = Database::connect(
    $config['host'],
    $config['port'],
    $config['name'],
    $config['user'],
    $config['password']
);

$stmt = $db->query('SELECT 1');
$result = $stmt->fetchColumn();

echo $result;
