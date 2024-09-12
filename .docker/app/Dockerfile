FROM php:8.2-fpm

# ID пользователя должны совпадать(в конт. и на машине)
ARG DOCKER_ID=1000
ARG DOCKER_GUID=1000

# создаем группу внутри контейнера
RUN groupadd -g $DOCKER_GUID docker

# создаем пользователя
RUN useradd -g $DOCKER_GUID -u $DOCKER_ID docker

COPY .docker/app/docker-entrypoint.sh /docker-entrypoint.sh

RUN apt-get update && apt-get install -y libpq-dev zip

RUN docker-php-ext-install pdo_pgsql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

# переключаемся на пользователя
USER docker

ENTRYPOINT /docker-entrypoint.sh