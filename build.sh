#!/usr/bin/env bash
# Arrêter le script si une commande échoue
set -o errexit

# Installer les dépendances
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Vider et optimiser les caches Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Lancer les migrations MySQL automatiquement
php artisan migrate --force