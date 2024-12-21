# Base PHP image
FROM php:8.3-fpm-alpine

# Installer les dépendances système nécessaires
RUN apk add --no-cache \
    libpq-dev \
    bash \
    git \
    unzip \
    zip

# Installer les extensions PHP requises pour Symfony
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurer le répertoire de travail
WORKDIR /code

# Copier les fichiers du projet dans l'image (facultatif, car tu montes un volume)
# COPY . /code

RUN composer install --no-dev --optimize-autoloader

# Exécuter le script d'entrée pour ajuster les permissions et démarrer PHP-FPM
ENTRYPOINT ["sh", "-c", "chown -R www-data:www-data var && chmod -R 775 var && php-fpm"]
