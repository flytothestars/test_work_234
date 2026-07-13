<?php

namespace App\Controller;

use App\Core\View;

class HomeController
{
    public function __construct(private View $view)
    {
    }

    public function index($db)
    {
        $stmt = $db->query('SELECT * FROM categories');
        $categories = [];
        while ($row = $stmt->fetch()) {
            $categories[] = $row;
        }

        $this->view->render('home.tpl', ['title' => 'Hello World', 'categories' => $categories]);
    }
}