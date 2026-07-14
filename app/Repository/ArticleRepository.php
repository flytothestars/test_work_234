<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;

final class ArticleRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch();

        return $row === false ? null : $row;
    }

    public function latestByCategory(int $categoryId, int $limit): array
    {
        $sql = 'SELECT a.*
                FROM articles a
                JOIN article_category ac ON ac.article_id = a.id
                WHERE ac.category_id = :cid
                ORDER BY a.published_at DESC
                LIMIT :limit';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('cid', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function byCategory(int $categoryId): array
    {
        $sql = "SELECT a.*
                FROM articles a
                JOIN article_category ac ON ac.article_id = a.id
                WHERE ac.category_id = :cid";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('cid', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function categoriesOf(int $articleId): array
    {
        $sql = 'SELECT c.*
                FROM categories c
                JOIN article_category ac ON ac.category_id = c.id
                WHERE ac.article_id = :aid
                ORDER BY c.name';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['aid' => $articleId]);

        return $stmt->fetchAll();
    }
}
