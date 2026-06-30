CREATE TABLE IF NOT EXISTS `categories` (
    `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(150) NOT NULL,
    `description` TEXT NULL,
    `created_at`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `articles` (
    `id`           INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title`        VARCHAR(255) NOT NULL,
    `description`  VARCHAR(500) NOT NULL,
    `body`         MEDIUMTEXT NOT NULL,
    `image`        VARCHAR(500) NULL,
    `views`        INT UNSIGNED NOT NULL DEFAULT 0,
    `published_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_at`   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `article_category` (
    `article_id`  INT UNSIGNED NOT NULL,
    `category_id` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`article_id`, `category_id`),
    CONSTRAINT `fk_ac_article`  FOREIGN KEY (`article_id`)  REFERENCES `articles` (`id`),
    CONSTRAINT `fk_ac_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
);