FROM php:8.0.2-fpm

RUN apt-get update && apt-get install -y git curl zip vim unzip libicu-dev

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl pdo pdo_mysql intl

RUN pecl install xdebug \
	&& docker-php-ext-enable xdebug

COPY xdebug.ini "${PHP_INI_DIR}/conf.d"

WORKDIR /app