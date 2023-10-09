# Use the official PHP-FPM Alpine Linux image as the base image
FROM php:8.1-fpm-alpine

# Install PDO extension for MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN apk --no-cache add curl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory in the container
WORKDIR /var/www/html

# Expose the PHP-FPM port (default is 9000)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
