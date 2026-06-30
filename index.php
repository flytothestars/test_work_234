<?php

require __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/config/config.php';

use App\Core\Database;

$db = Database::connect(
    $config['db']['host'],
    $config['db']['port'],
    $config['db']['name'],
    $config['db']['user'],
    $config['db']['password']
);

$stmt = $db->query('SELECT 1');
$result = $stmt->fetchColumn();

echo $result;
