FROM php:8.2-apache

RUN apt-get update && apt-get install -y default-mysql-client libpng-dev libzip-dev unzip && docker-php-ext-install pdo pdo_mysql mysqli

WORKDIR /var/www/html

COPY . /var/www/html/

EXPOSE 80
