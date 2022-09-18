FROM php:8.1-fpm-alpine

ARG BUILD_DATE
ARG VCS_REF

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV PHP_XDEBUG_DEFAULT_ENABLE ${PHP_XDEBUG_DEFAULT_ENABLE:-1}
ENV PHP_XDEBUG_REMOTE_ENABLE ${PHP_XDEBUG_REMOTE_ENABLE:-1}
ENV PHP_XDEBUG_REMOTE_HOST ${PHP_XDEBUG_REMOTE_HOST:-"127.0.0.1"}
ENV PHP_XDEBUG_REMOTE_PORT ${PHP_XDEBUG_REMOTE_PORT:-9000}
ENV PHP_XDEBUG_REMOTE_AUTO_START ${PHP_XDEBUG_REMOTE_AUTO_START:-1}
ENV PHP_XDEBUG_REMOTE_CONNECT_BACK ${PHP_XDEBUG_REMOTE_CONNECT_BACK:-1}
ENV PHP_XDEBUG_IDEKEY ${PHP_XDEBUG_IDEKEY:-docker}
ENV PHP_XDEBUG_PROFILER_ENABLE ${PHP_XDEBUG_PROFILER_ENABLE:-0}
ENV PHP_XDEBUG_PROFILER_OUTPUT_DIR ${PHP_XDEBUG_PROFILER_OUTPUT_DIR:-"/profiler"}
ENV PHP_MEMORY_LIMIT ${PHP_MEMORY_LIMIT:-"2G"}

USER root

RUN set -ex \
  	&& apk update \
    && apk add --no-cache git mysql-client curl openssh-client icu libpng libjpeg-turbo postgresql-dev libffi-dev libzip-dev \
    && apk add --no-cache imagemagick-dev imagemagick \
    && apk add --no-cache --virtual build-dependencies icu-dev libxml2-dev freetype-dev libpng-dev libjpeg-turbo-dev g++ make autoconf \
    && docker-php-source extract \
    && pecl install xdebug redis imagick \
    && docker-php-ext-enable xdebug redis imagick \
    && docker-php-source delete \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pgsql pdo_mysql pdo_pgsql intl zip gd bcmath pcntl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && cd  / && rm -fr /src \
    && apk del build-dependencies \
    && rm -rf /tmp/*


COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug-dev.ini
COPY memory-limit-php.ini /usr/local/etc/php/conf.d/memory-limit-php.ini

USER 1000:1000

WORKDIR /var/www
CMD ["php-fpm"]

