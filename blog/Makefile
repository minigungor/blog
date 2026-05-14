.PHONY: up down build restart bash composer artisan migrate fresh seed test logs ps

up:
	docker compose up -d

build:
	docker compose up -d --build

down:
	docker compose down

restart:
	docker compose down
	docker compose up -d

bash:
	docker compose exec app bash

composer:
	docker compose exec app composer install

artisan:
	docker compose exec app php artisan

migrate:
	docker compose exec app php artisan migrate

fresh:
	docker compose exec app php artisan migrate:fresh --seed

seed:
	docker compose exec app php artisan db:seed

test:
	docker compose exec app php artisan test

logs:
	docker compose logs -f

ps:
	docker compose ps

clear:
	docker compose exec app php artisan optimize:clear
