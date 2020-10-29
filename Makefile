run:
	php artisan serve

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

da:
	composer dumpautoload

seed:
	php artisan db:seed

fresh:
	php artisan migrate:fresh
