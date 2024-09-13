docker-compose = docker-compose

up:
	${docker-compose} up -d
buildup:
	${docker-compose} up -d --build
stop:
	${docker-compose} stop
down:
	${docker-compose} down
composer-install:
	${docker-compose} exec -T php-fpm composer install
composer-update:
	${docker-compose} exec -T php-fpm composer update
migrate:
	${docker-compose} exec -T php-fpm php yii migrate
php-fpm:
	${docker-compose} exec -it php-fpm /bin/bash
