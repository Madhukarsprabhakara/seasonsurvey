FROM php:8.3-cli

RUN apt-get update && apt-get install -y supervisor

RUN docker-php-ext-install pdo pdo_mysql

RUN mkdir -p /var/log/supervisor

COPY ./supervisord/seasonsurvey-worker.conf /etc/supervisor/conf.d/seasonsurvey-worker.conf


CMD ["/usr/bin/supervisord"]
