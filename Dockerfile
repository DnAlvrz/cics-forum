FROM php:8.2-cli-alpine

RUN apk add --no-cache \
    bash git curl unzip zip \
    libpng-dev libjpeg-turbo-dev freetype-dev \
    oniguruma-dev icu-dev libzip-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo pdo_mysql \
        mbstring intl gd zip opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 1. COPY EVERYTHING FIRST (IMPORTANT FIX)
COPY . .

# 2. NOW run composer (artisan already exists)
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress \
    --ignore-platform-reqs

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]