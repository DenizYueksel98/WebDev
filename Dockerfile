FROM php:8.1.10-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli