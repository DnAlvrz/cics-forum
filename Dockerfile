FROM php:8.2-cli-alpine

# System dependencies (FULL Laravel survival kit)
RUN apk add --no-cache \
    bash \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    icu-dev \
    libzip-dev

# PHP extensions (this is where most builds used to break)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        intl \
        gd \
        zip \
        opcache

# Install Composer (clean, official)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Work directory
WORKDIR /app

# Copy only composer files first (cache optimization)
COPY composer.json composer.lock ./

# Install dependencies (robust mode)
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress

# Copy the rest of the app
COPY . .

# Laravel permissions (silent killer if missing)
RUN chmod -R 775 storage bootstrap/cache

# Expose Render port
EXPOSE 8000

# Start app
CMD php artisan serve --host=0.0.0.0 --port=8000