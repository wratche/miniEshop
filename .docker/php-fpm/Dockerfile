FROM php:7.4-fpm

COPY ./.shared/scripts/ /tmp/scripts/
RUN chmod +x -R /tmp/scripts/

# add users
ARG APP_USER=www-data
ARG APP_GROUP=www-data
ARG APP_USER_ID=1000
ARG APP_GROUP_ID=1000

#//todo vyresit a zbavit se
RUN /tmp/scripts/create_user.sh ${APP_USER} ${APP_GROUP} ${APP_USER_ID} ${APP_GROUP_ID}
#ENTRYPOINT ['bash', '-c', 'chmod 777 /var/www/current/temp/']

RUN apt-get update

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-install opcache

RUN pecl install xdebug

# php config
COPY ./.shared/config/php/conf.d/*  /usr/local/etc/php/conf.d/

# workdir
WORKDIR "/var/www/current"

EXPOSE 9000

