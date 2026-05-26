FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libicu-dev libzip-dev libonig-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install \
        pdo pdo_mysql mbstring intl gd zip opcache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app


COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress \
    --no-scripts \
    --prefer-dist \
    --classmap-authoritative

COPY . .

RUN mkdir -p storage bootstrap/cache


RUN chmod -R 775 storage bootstrap/cache


RUN php artisan package:discover --ansi || true

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]