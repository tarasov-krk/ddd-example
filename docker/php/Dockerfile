FROM php:8.3-fpm

RUN apt-get update -qq && apt-get install -y git \
    curl \
    perl \
    zip \
    libfreetype6-dev \
    libzip-dev

RUN docker-php-ext-install \
    opcache \
    iconv \
    zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm -r /var/lib/apt/lists/*
