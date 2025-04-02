FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar el código fuente de la aplicación
COPY ./app/index.php /var/www/html/.

EXPOSE 9000