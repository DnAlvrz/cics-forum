FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    bash git curl unzip zip \
    libpng-dev libjpeg-turbo-dev freetype-dev \
    oniguruma-dev icu-dev libzip-dev


RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo pdo_mysql mbstring intl gd zip opcache


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app


COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader \
    --classmap-authoritative \
    --no-scripts


COPY . .

RUN mkdir -p storage bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

RUN php artisan package:discover --ansi || true


EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force || true && php -S 0.0.0.0:8000 -t public"]