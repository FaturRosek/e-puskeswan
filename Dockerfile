# Gunakan image PHP dengan ekstensi penting
FROM php:8.2-cli

# Install ekstensi yang dibutuhkan Laravel + phpspreadsheet
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev libzip-dev zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Set working directory
WORKDIR /app

# Copy composer dan file project
COPY composer.json composer.lock ./

# Install dependencies tanpa memanggil artisan command (supaya gak error DB)
RUN composer install --no-interaction --optimize-autoloader --no-scripts

# Copy semua file project
COPY . .

# Build asset frontend kalau ada
RUN npm install && npm run build

# Expose port (Railway akan override ini otomatis)
EXPOSE 8000

# Jalankan Laravel server saat container dijalankan
CMD php artisan serve --host=0.0.0.0 --port=8000
