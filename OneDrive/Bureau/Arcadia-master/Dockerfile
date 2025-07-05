FROM php:8.2-apache

# Installation des dépendances système et extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    git

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installation de l'extension MongoDB
RUN pecl install mongodb-1.21.0 \
    && docker-php-ext-enable mongodb

# Installation des extensions PHP
RUN docker-php-ext-install \
    pdo_mysql \
    intl \
    zip

# Activation du module rewrite d'Apache
RUN a2enmod rewrite headers

# Configuration du répertoire de travail
WORKDIR /var/www/html
RUN chmod -R 755 /var/www/html


# Configuration des permissions
RUN chown -R www-data:www-data /var/www/html 