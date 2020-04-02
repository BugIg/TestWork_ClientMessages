FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        git \
        curl \
        wget \
        libfreetype6-dev \
        libmcrypt-dev \
        unzip \
        libjpeg62-turbo-dev \
        libzip-dev \
        libonig-dev \
        graphviz \
        libpng-dev zlib1g-dev libicu-dev g++ libmagickwand-dev --no-install-recommends libxml2-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install mbstring zip xml gd pdo_mysql \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && pecl install xdebug-2.8.0 \
    && docker-php-ext-enable xdebug

ADD ./php.ini /usr/local/etc/php/php.ini

RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

COPY ./laravel.ini /usr/local/etc/php/conf.d
COPY ./xlaravel.pool.conf /usr/local/etc/php-fpm.d/

WORKDIR /var/www

CMD ["php-fpm"]