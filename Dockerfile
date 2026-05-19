FROM php:8.3-apache

# Installer les extensions PHP nécessaires pour Laravel et MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Activer le module Apache Rewrite pour Laravel
RUN a2enmod rewrite

# Configurer le dossier public de Laravel comme racine d'Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
WORKDIR /var/www/html
COPY . .

# Installer les dépendances et donner les permissions aux dossiers Laravel
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Commande de démarrage : exécute les migrations PUIS lance Apache au premier plan
CMD php artisan migrate --force && apache2-foreground

EXPOSE 80