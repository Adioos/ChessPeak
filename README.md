make up
make composer-install
config/web.php add cookieValidationKey
docker-compose exec -it php-fpm /bin/bash
chown -R www-data:www-data /var/www/web/assets
