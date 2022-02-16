run-dev:
	docker-compose up -d
	docker-compose exec node sh -c "npm run dev"

run-watch:
	docker-compose up -d
	docker-compose exec node sh -c "npm run watch"

npm-install:
	docker-compose exec node sh -c "npm install"

run-migrate:
	docker-compose exec app sh -c "php artisan migrate"

run-seed:
	docker-compose exec app sh -c "php artisan db:seed"

build-local:
	docker-compose up -d --build
	docker-compose exec app sh -c "composer install"
	docker-compose exec app sh -c "php artisan migrate"
	docker-compose exec app sh -c 'php artisan db:seed'
	docker-compose exec app sh -c 'php artisan storage:link'
	docker-compose exec node sh -c "npm install && npm run dev"

stop-dev:
	docker-compose down -v
