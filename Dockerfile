# Gunakan PHP 8.2 FPM official image
FROM php:8.2-fpm

# Install OS dependencies dan ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql zip gd mbstring exif pcntl bcmath opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set direktori kerja Laravel
WORKDIR /var/www/html

# Copy semua file project
COPY . .

# Install Composer dari image resmi Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependensi Laravel
RUN composer install --optimize-autoloader --no-interaction --no-scripts

# Pastikan port yang Railway pakai tersedia
EXPOSE 8000

# Jalankan Laravel di port yang Railway tentukan
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
