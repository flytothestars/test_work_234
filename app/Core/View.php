<?php

namespace App\Core;

use Smarty\Smarty;

class View
{
    public Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../../view/');
        $this->smarty->setCompileDir(__DIR__ . '/../../view_c/');
        $this->smarty->setCacheDir(__DIR__ . '/../../cache/');
        $this->smarty->setConfigDir(__DIR__ . '/../../config/');
    }


    public function render(string $template, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        $this->smarty->display($template);
    }   
}   