<?php

namespace App\Repository;

use PDO;

final class CategoryRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch();

        return $row === false ? null : $row;
    }

    public function allWithArticles(): array
    {
        $sql = 'SELECT c.*
                FROM categories c
                WHERE EXISTS (
                    SELECT 1 FROM article_category ac WHERE ac.category_id = c.id
                )
                ORDER BY c.name';

        return $this->pdo->query($sql)->fetchAll();
    }
}
