#!/bin/bash
set -e
chown -R www-data:www-data /var/www/html/modules
chown -R www-data:www-data /var/www/html/themes
chown -R www-data:www-data /var/www/html/sites
chmod 744 /var/www/html/sites/default/files

rm -f /var/run/apache2/apache2.pid
exec apache2-foreground
