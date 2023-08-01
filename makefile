pint:
	vendor/bin/pint

model:
	php artisan -M ide-helper:models

serve:
	php artisan serve --host=0.0.0.0 --port=11010

debug:
	export XDEBUG_MODE=debug && make serve

dev:
	export XDEBUG_MODE=dev && make serve

fpm:
	php -S 0.0.0.0:11010 -t public
