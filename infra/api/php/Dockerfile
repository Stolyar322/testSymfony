FROM php:8.1-fpm

ENV TZ=Europe/Moscow
ENV CFLAGS="$CFLAGS -D_GNU_SOURCE"

WORKDIR /var/www/api

RUN apt-get update && apt-get install -y --force-yes \
    libicu-dev \
    libzip-dev \
    unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug-3.2.1 && docker-php-ext-enable xdebug

RUN docker-php-ext-install -j$(nproc) intl opcache zip \
    && docker-php-ext-enable intl opcache zip

CMD ["php-fpm"]
