# Use PHP 8 with Apache
FROM php:8.2-apache

# Install system dependencies and PostgreSQL dev headers
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy Apache virtual host config
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Copy app files
COPY ./public /var/www/html/
COPY ./server /var/www/html/server/

# Set permissions
RUN chown -R www-data:www-data /var/www/html
