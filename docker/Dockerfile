FROM php:7.4-apache  
WORKDIR /var/www/html
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y 
RUN chmod 777 -R /tmp && chmod o+t -R /tmp
# && apt-get install php-mysqli
COPY . .

