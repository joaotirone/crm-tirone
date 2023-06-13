FROM php:8.1-fpm



RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY default.conf /etc/nginx/conf.d/default.conf

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN mkdir -p /var/www/storage/logs && chmod -R 777 /var/www/storage
RUN ls -al /var/www/storage
RUN chmod -R 777 /var/www/storage/logs
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
COPY --chown=www:www . /home/app/crm-tirone
USER www

WORKDIR /var/www/

EXPOSE 81

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
