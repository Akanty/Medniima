FROM php:8.4-apache

RUN docker-php-ext-install mysqli \
	&& a2enmod rewrite \
	&& sed -ri 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
	&& sed -i 's/Listen 80/Listen 8000/' /etc/apache2/ports.conf \
	&& sed -i 's/<VirtualHost \*:80>/<VirtualHost *:8000>/' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
