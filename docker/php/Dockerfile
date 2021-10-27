FROM php:8.0-fpm-alpine
# COPY php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# install Node.js
COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

RUN apk --no-cache update && apk --no-cache upgrade
RUN apk --no-cache add \
    autoconf \
    gcc \
    g++ \
    make \
    git

RUN docker-php-ext-install \
    bcmath \
    pdo_mysql


WORKDIR /var/www/html
