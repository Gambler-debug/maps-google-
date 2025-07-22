# Use PHP 8 with Apache
FROM php:8.2-apache

# Enable required PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Copy project files into Apache's web directory
COPY ./public /var/www/html/
COPY ./server /var/www/html/server/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache to route .php correctly
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
