# Use the official PHP 8.1 image as the base image
FROM php:8.1-apache

# Install any necessary dependencies
RUN apt-get update \
    && apt-get install -y \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Download and install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the application code into the container
COPY . .

# Expose port 80 to the host machine
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]
