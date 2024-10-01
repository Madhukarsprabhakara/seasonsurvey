FROM php:8.3.11-fpm-alpine

RUN mkdir -p /var/www/html


RUN apk add libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql


