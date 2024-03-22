FROM php:8.2-fpm-alpine

RUN apk add --update linux-headers
# Install system dependencies
RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apk add --update libzip-dev composer curl-dev &&\
    docker-php-ext-install curl && \
    apk del gcc g++ &&\
    rm -rf /var/cache/apk/*

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Set working directory
WORKDIR /var/www/html

EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080