FROM php:8.2-fpm-alpine
RUN apk --no-cache add postgresql-dev ; \
    docker-php-ext-install pdo pdo_pgsql
COPY .infrastructure/resources/php.conf /usr/local/etc/php-fpm.d/www.conf
WORKDIR /app
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.* ./
RUN echo '<?php return [];' > .env.local.php ; \
    mkdir var ; \
    chmod 777 var ; \
    composer install --no-dev --no-scripts
COPY bin bin/
COPY config config/
COPY public public/
COPY src src/
