# FROM php:8.1.0-fpm
# FROM php:8.4.1-fpm
# FROM php:8.0.0-fpm
FROM php:7.4.0-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y git curl zip vim unzip libicu-dev libxml2-dev libgmp-dev

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl pdo pdo_mysql intl soap
RUN docker-php-ext-install -j$(nproc) gmp

# RUN pecl install xdebug \
# 	&& docker-php-ext-enable xdebug

# COPY xdebug.ini "${PHP_INI_DIR}/conf.d"

# setup composer
COPY --from=composer:2 --chown=www-data:www-data /usr/bin/composer /usr/bin/composer
