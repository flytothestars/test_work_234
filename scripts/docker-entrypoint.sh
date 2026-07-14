#!/bin/sh
set -e

DB_HOST="${DB_HOST:-db}"
DB_PORT="${DB_PORT:-3306}"
DB_USER="${DB_USER:-user}"
DB_PASSWORD="${DB_PASSWORD:-StrongPassword!}"
DB_NAME="${DB_NAME:-news}"

echo "${DB_HOST}:${DB_PORT}..."
until php -r '
    try {
        new PDO(
            "mysql:host=" . getenv("DB_HOST") . ";port=" . getenv("DB_PORT") . ";dbname=" . getenv("DB_NAME"),
            getenv("DB_USER"),
            getenv("DB_PASSWORD")
        );
        exit(0);
    } catch (Throwable $e) {
        exit(1);
    }
'; do
    sleep 2
done
echo "MySQL готов"

php /var/www/html/scripts/migrations.php
echo

php /var/www/html/scripts/seeder.php
echo

exec "$@"
