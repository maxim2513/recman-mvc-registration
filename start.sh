#!/bin/bash

# Start Docker containers
docker-compose up -d --build

# Install PHP dependencies
docker-compose exec -T php-fpm composer install

echo "Application is running at http://localhost"
