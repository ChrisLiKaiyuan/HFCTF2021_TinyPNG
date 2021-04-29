#!/bin/bash

sed -i 's/Options Indexes FollowSymLinks/Options None/' /etc/apache2/apache2.conf
sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
sed -i 's/combined/#combined/' /etc/apache2/apache2.conf
echo 'LogFormat "%h %l %u %t \"%r\" %>s" combined' >> /etc/apache2/apache2.conf
cat /default.conf > /etc/apache2/sites-enabled/000-default.conf
cat /ports.conf > /etc/apache2/ports.conf

chmod 777 /var/www/html/storage -R

cd /var/www/html && php artisan storage:link

su root -l -c "docker-php-entrypoint apache2-foreground"

