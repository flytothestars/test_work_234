<?php

declare(strict_types=1);

/**
 * Compiles scss/style.scss into public/assets/css/style.css.
 * Pure PHP (scssphp) — no Node toolchain required.
 *
 * Usage: composer build-css
 */

// scssphp 1.13 emits E_DEPRECATED on PHP 8.4; silence those for clean output.
error_reporting(E_ALL & ~E_DEPRECATED);

require __DIR__ . '/../vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\OutputStyle;

$src  = __DIR__ . '/../public/style.scss';
$out  = __DIR__ . '/../public/assets/css/style.css';

if (!is_dir(dirname($out))) {
    mkdir(dirname($out), 0775, true);
}

$compiler = new Compiler();
$compiler->setOutputStyle(OutputStyle::COMPRESSED);

$css = $compiler->compileString(file_get_contents($src))->getCss();
file_put_contents($out, $css);

echo "Compiled {$src}\n      -> {$out}\n";
