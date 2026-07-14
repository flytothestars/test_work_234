FROM php:8.4-apache

RUN apt-get update && apt-get install -y default-mysql-client libpng-dev libzip-dev unzip && docker-php-ext-install pdo pdo_mysql mysqli

RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    && sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock* ./
RUN composer install --no-interaction --no-scripts --prefer-dist || true

COPY . .
RUN composer install --no-interaction --prefer-dist \
    && composer build-css \
    && chown -R www-data:www-data /var/www/html
