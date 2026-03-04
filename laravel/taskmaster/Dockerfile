# Usamos la versión de PHP que necesita Laravel
FROM php:8.4-fpm

# Instalamos las dependencias del sistema necesarias para PHP y Composer
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev

# Limpiamos caché de instalación
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalamos extensiones de PHP necesarias
RUN docker-php-ext-install pdo_mysql zip exif pcntl gd

# Instalamos COMPOSER (el gestor de paquetes de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definimos nuestra carpeta de trabajo dentro del contenedor
WORKDIR /var/www

# Copiamos nuestro código al contenedor
COPY . /var/www

# Damos permisos a las carpetas de Laravel para que funcionen
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Puerto que usará la app
EXPOSE 9000

CMD ["php-fpm"]