FROM php:7.4-apache  
WORKDIR /var/www/html
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y 
# && apt-get install php-mysqli
COPY . .

