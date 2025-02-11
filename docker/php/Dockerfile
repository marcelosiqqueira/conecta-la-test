FROM php:8.4-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www

# Criar diretórios necessários
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache

# Ajustar permissões (corrigido)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expor a porta do PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
