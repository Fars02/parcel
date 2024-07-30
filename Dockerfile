# Use an official PHP runtime as a parent image
FROM php:8.0-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

# Expose port 80 to the outside world
EXPOSE 80
