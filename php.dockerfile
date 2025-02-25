FROM php:8.3.11-fpm-alpine

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel
RUN mkdir -p /var/www/html

RUN apk add libxml2-dev
RUN apk add libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql soap

RUN chown -R  laravel:laravel /var/www/html



