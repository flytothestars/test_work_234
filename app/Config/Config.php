<?php

namespace App\Config;

class Config
{
    public const PAGINATION_LIMIT = 6; 
    
    public static function db(): array
    {
        return [
            'host' => getenv('DB_HOST', '127.0.0.1'),
            'port' => getenv('DB_PORT', '3306'),
            'name' => getenv('DB_NAME', 'news'),
            'user' => getenv('DB_USER', 'user'),
            'password' => getenv('DB_PASSWORD', 'StrongPassword!'),
        ];
    }
}
