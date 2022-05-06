FROM php:7.2-fpm

# Install any custom system requirements here
RUN apt-get update \
  && apt-get install --no-install-recommends -y \
  && apt-get install -y git \
  && apt-get install -y vim nano \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  libzip-dev \
  zlib1g-dev \
  libc-client-dev \
  libkrb5-dev \
  gnupg2


RUN pecl install xdebug-2.9.0 \
  && docker-php-ext-enable xdebug


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# USER 1000:1000

# start
CMD ["php-fpm"]
