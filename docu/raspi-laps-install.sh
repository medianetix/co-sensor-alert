#!/bin/bash

# install php 8.1 and apache2 in fresh Debian 11

sudo apt install apt-transport-https lsb-release ca-certificates wget curl -y
#sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg 
#sudo sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
sudo apt update

sudo apt install sqlite3, apache2 php8.1 php8.1-common libapache2-mod-php8.1 -y
sudo apt install php8.1-{bcmath,bz2,curl,gd,intl,mbstring,sqlite3,xml,xsl} -y

# check results
php -v
php -m

