<?php
declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function set(string $pattern, callable $handler): void
    {
        $regex = preg_replace('#\{(\w+)\}#', '(?P<$1>[^/]+)', $pattern);
        $this->routes[] = [
            'pattern' => '#^' . $regex . '$#',
            'handler' => $handler,
        ];
    }

    public function dispatch(string $path): void
    {
        $path = '/' . trim(parse_url($path, PHP_URL_PATH) ?: '/', '/');

        foreach ($this->routes as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                ($route['handler'])($params);
                return;
            }
        }

        http_response_code(404);
        echo '404 — Page not found';
    }
}
