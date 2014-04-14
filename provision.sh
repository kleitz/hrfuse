#!/bin/bash

# Update package lists
# --------------------
apt-get update


# Install PPA for PHP 5.5
# -----------------------
apt-get install -y python-software-properties
add-apt-repository -y ppa:ondrej/php5
apt-get update


# Install cURL
# ------------
apt-get install -y curl


# Install Apache2
# ---------------
apt-get install -y apache2
rm -rf /var/www
ln -fs /vagrant /var/www

echo "ServerName localhost" >> /etc/apache2/apache2.conf
VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot /var/www/public
    <Directory "/var/www/public/">
        Require all granted
        AllowOverride All
    </Directory>
</VirtualHost>
EOF
)
touch /etc/apache2/sites-available/creatorscast.conf
echo "${VHOST}" > /etc/apache2/sites-available/creatorscast.conf

a2enmod rewrite
a2dissite 000-default
a2ensite creatorscast
service apache2 restart


# Install PHP
# -----------
apt-get install -y php5 php5-cli php5-mcrypt php5-curl php5-json libapache2-mod-php5

php5enmod json
service apache2 restart


# Install MySQL
# -------------
export DEBIAN_FRONTEND=noninteractive
apt-get install -q -y mysql-server php5-mysql


# Install Git
# -----------
apt-get install -y git-core


# Install Composer
# ----------------
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer


# Set up the db
# -------------
echo "CREATE DATABASE IF NOT EXISTS hrfuse" | mysql
echo "CREATE USER 'hrfuse'@'localhost' IDENTIFIED BY ''" | mysql
echo "GRANT ALL PRIVILEGES ON hrfuse.* TO 'hrfuse'@'localhost' IDENTIFIED BY ''" | mysql


# Set up the site
# ---------------
cd /var/www

composer install --prefer-dist
php artisan migrate --seed


# Give the services a final restart
# ---------------------------------
service apache2 restart
service mysql restart
