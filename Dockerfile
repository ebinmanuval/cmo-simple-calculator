FROM php:7.4-cli

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN apt update
RUN apt upgrade

RUN alias composer='php /usr/bin/composer'
RUN composer install \
  --no-interaction \
  --no-plugins \
  --no-scripts \
  --no-dev \
  --prefer-dist

EXPOSE 8080
CMD php -S 0.0.0.0:8080

