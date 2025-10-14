# Jangan panggil artisan command yang butuh DB waktu build
RUN composer install --no-interaction --optimize-autoloader --no-scripts
# (hapus php artisan config:cache saat build)
