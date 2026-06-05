FROM php:8.1-apache

# Install ekstensi pdo dan pdo_mysql untuk koneksi ke MariaDB
RUN docker-php-ext-install pdo pdo_mysql

# Aktifkan modul rewrite Apache jika dibutuhkan
RUN a2enmod rewrite

# Copy seluruh source code aplikasi ke direktori web Apache
COPY . /var/www/html/

# FIX: Mengubah -W menjadi -R (Recursive) agar tidak error saat build
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80 di dalam kontainer
EXPOSE 80