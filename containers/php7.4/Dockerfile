FROM php:7.4-fpm as base
MAINTAINER ANOUAR KAHLA

# Install PHP extensions and PECL modules.
RUN apt-get update && deps=" \
        apt-utils \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libcurl4-openssl-dev \
        libicu-dev \
        libmcrypt-dev \
        libssl-dev \
        libpq-dev \
        libzip-dev \
        wget \
        git \
        vim \
        unzip \
        netcat \
    " \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y -q $deps

RUN docker-php-ext-install intl zip \
    && docker-php-ext-enable intl \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && rm -r /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql pgsql pdo_pgsql


RUN pecl install xdebug \
    && docker-php-ext-enable xdebug


COPY ./ /
WORKDIR /var/www/
VOLUME /var/www

EXPOSE 9020 9020

#############################################################################################

From base

SHELL ["/bin/bash", "-c"]

RUN echo "you should now run composer install"
