FROM php:7.4-apache

# make sure apt is up to date
RUN apt-get update --fix-missing

# apache
RUN a2enmod rewrite
RUN a2enmod headers
RUN service apache2 restart

RUN apt-get install -y librabbitmq-dev libssl-dev
RUN pecl install amqp || true

RUN docker-php-ext-enable amqp