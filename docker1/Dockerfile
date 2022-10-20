FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    jpegoptim optipng pngquant gifsicle \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    build-essential \
    libfontconfig1 \
    libxrender1 \
    libpng-dev \
    libzip-dev \
    libpq-dev \
    locales \
    unzip \
    zip \
    vim \
    git \
    curl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions php
RUN docker-php-ext-install pdo pdo_mysql zip exif pcntl bcmath

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

RUN pecl install xdebug-3.1.5 \
    && docker-php-ext-enable xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug-dev.ini
COPY memory-limit-php.ini /usr/local/etc/php/conf.d/custom-php.ini

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www

WORKDIR /var/www/html

