FROM php:8.3-fpm

WORKDIR /var/www

COPY php.ini /usr/local/etc/php/php.ini

RUN apt update && apt upgrade -y

RUN apt install -y \
    iputils-ping \
    libcurl3-dev \
    libcurl4-openssl-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libonig-dev \
    libpng-dev \
    libpq-dev \
    libssl-dev \
    libxml2-dev \
    libzip-dev \
    pkg-config \
    zlib1g-dev \
    git \
    bash \
    vim \
    g++

RUN pecl install xdebug-3.3.1 \
    && pecl install redis \
    && docker-php-ext-install pdo_mysql \
    bcmath \
    gd \
    mysqli \
    zip \
    opcache \
    && docker-php-ext-enable xdebug redis mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data \
    && groupmod -g 1000 www-data

USER 1000:1000

CMD ["php-fpm"]

