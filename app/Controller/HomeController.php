<?php

namespace App\Controller;

class HomeController
{
    public function index($db)
    {
        $stmt = $db->query('SELECT * FROM categories');
        while ($row = $stmt->fetch()) {
            echo $row['name'] . '<br>';
        }
        echo "Hello, World!";
    }
}