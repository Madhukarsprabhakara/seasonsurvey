FROM php:8.3.11-cli

RUN apt-get update && apt-get install -y supervisor libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN mkdir -p /var/log/supervisor


ADD ./supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
ADD ./supervisord/seasonsurvey-worker.conf /etc/supervisor/conf.d/seasonsurvey-worker.conf
ADD ./src/ /var/www/html



ENTRYPOINT ["sh", "-c"]
CMD ["supervisord --nodaemon && tail -f /dev/null"]


