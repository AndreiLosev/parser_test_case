# Для начала указываем исходный образ, он будет использован как основа
FROM php:7-apache

# RUN выполняет идущую за ней команду в контексте нашего образа.
# В данном случае мы установим некоторые зависимости и модули PHP.
# Для установки модулей используем команду docker-php-ext-install.
# На каждый RUN создается новый слой в образе, поэтому рекомендуется объединять команды.
RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
		libzip-dev \
		libonig-dev\
    && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
    && docker-php-ext-install exif \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/\
    && docker-php-ext-install -j$(nproc) gd \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

    
# Ставим Composer'а.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# USER www-data:www-data
RUN usermod -u 1000 www-data
# права на заипись в /var/www/html
# RUN chown www-data:www-data /var/www/html/ 

# Указываем рабочую директорию для PHP
WORKDIR /var/www/html
