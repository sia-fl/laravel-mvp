HOST_DEV = 127.0.0.1
HOST_PROD = 0.0.0.0
PORT = 11010

pint:
	vendor/bin/pint

model:
	php artisan -M ide-helper:models

serve:
	php artisan serve --host=$(HOST) --port=$(PORT)

debug:
	export XDEBUG_MODE=debug && make HOST=$(HOST_DEV) serve

dev:
	export XDEBUG_MODE=dev && make HOST=$(HOST_DEV) serve

prod:
	make HOST=$(HOST_PROD) serve

fpm:
	php -S 0.0.0.0:11010 -t public
