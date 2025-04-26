FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory-limit.ini
RUN echo "upload_max_filesize=100M" > /usr/local/etc/php/conf.d/upload-max-filesize.ini
RUN echo "post_max_size=100M" > /usr/local/etc/php/conf.d/post-max-size.ini
RUN echo "max_execution_time=300" > /usr/local/etc/php/conf.d/max-execution-time.ini
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]
