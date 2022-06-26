FROM ubuntu:20.04
ENV DEBIAN_FRONTEND noninteractive
WORKDIR /var/www

# Install dependencias APT
RUN apt-get update && apt-get install -y apt-utils software-properties-common

# Install PHP and extensions 
RUN add-apt-repository ppa:ondrej/php -y && apt-get update 
RUN apt-get install -y php8.1 php8.1-mbstring php8.1-intl php8.1-curl php8.1-soap php8.1-xdebug

# Install Apache
RUN apt-get install apache2 -y
COPY ./localhost.conf /etc/apache2/sites-available/localhost.conf
RUN apt-get install -y nano
RUN a2dissite 000-default.conf && a2ensite localhost.conf
RUN echo 'ServerName 127.0.0.1' >> /etc/apache2/apache2.conf
RUN ln -s /var/www/Config/xbox.ini /etc/php/8.1/apache2/conf.d/xbox.ini
RUN ln -s /var/www/Config/xbox.ini /etc/php/8.1/cli/conf.d/xbox.ini

# Isntall Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN mv composer.phar /usr/local/bin/composer

# Start Apache in Background
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]