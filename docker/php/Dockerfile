FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

RUN sed -i \
    -e "s/^user = .*/user = www/" \
    -e "s/^group = .*/group = www/" \
    /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www

COPY --chown=www:www . .

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && chown -R www:www /var/www/storage /var/www/bootstrap/cache

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --chmod=755 docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]

EXPOSE 9000

CMD ["php-fpm"]