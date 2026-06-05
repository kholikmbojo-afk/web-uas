FROM php:8.1-apache

# Install ekstensi pdo dan pdo_mysql untuk koneksi ke MariaDB/MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Aktifkan modul rewrite Apache jika dibutuhkan
RUN a2enmod rewrite

# Copy source code aplikasi ke direktori web Apache
COPY . /var/www/html/

# Atur hak akses agar Apache bisa membaca file dengan benar
RUN chown -W www-data:www-data /var/www/html/

# Expose port 80 di dalam kontainer
EXPOSE 80