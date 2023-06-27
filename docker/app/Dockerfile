FROM php:8.1.1-fpm

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y zip unzip git

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www
