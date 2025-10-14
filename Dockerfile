# Gunakan image composer resmi (sudah ada PHP & Composer)
FROM composer:2.7 AS build

# Set working directory
WORKDIR /app

# Copy file composer dulu
COPY composer.json composer.lock ./

# Install dependencies tanpa script artisan (supaya gak error DB)
RUN composer install --no-interaction --optimize-autoloader --no-scripts

# Copy semua file project
COPY . .

# Install dependencies NodeJS jika kamu punya frontend
RUN apt-get update && apt-get install -y nodejs npm && npm install && npm run build || true

# Gunakan PHP runtime (lebih ringan untuk jalanin Laravel)
FROM php:8.2-cli

# Install ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Set working directory di runtime
WORKDIR /app

# Copy hasil build dari stage sebelumnya
COPY --from=build /app /app

# Expose port 8000
EXPOSE 8000

# Jalankan Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
