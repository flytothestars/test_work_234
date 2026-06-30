<?php 

namespace App\Core;

use PDO;

class Database
{
    private static ?PDO $instance = null;

    public static function connect(string $host, string $port, string $dbName, string $username, string $password): PDO
    {
        if (self::$instance instanceof PDO) {
            return self::$instance;
        }

        self::$instance = new PDO(
            "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8mb4",
            $username,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        return self::$instance;
    }
}