# Todolist
Laravel project sample

## Requirement

* PHP >= 8.1
* node >= 16.1.0 (for `npm`)
* postgres >= 12

or use

- docker
- docker compose

## test account

`admin@test.com`/`password`

## Installation

### local (required php, node, postgresSql)

```
composer install
npm install
npm run dev
php artisan migrate
php artisan db:seed (if you need)
php artisan serve
```

### docker compose
- 建立環境:
```bash
docker-compose up -d --build
docker-compose exec app sh -c "composer install"
docker-compose exec app sh -c "php artisan migrate"
docker-compose exec app sh -c 'php artisan db:seed --class="RolesAndPermissionsSeeder"'
docker-compose exec app sh -c 'php artisan storage:link'
docker-compose exec node sh -c "npm install && npm run dev"
```

- develop in watch mode:
```bash
docker-compose up -d
docker-compose exec node sh -c "npm run watch"
```

- build pages in dev:
```bash
docker-compose up -d
docker-compose exec node sh -c "npm run dev"
```

- install js packages: ( or just run `npm install`)
```bash
docker-compose exec node sh -c "npm install"
```

- 更新 database:
```bash
docker-compose exec app sh -c "php artisan migrate"
```

- 建立假資料
```bash
docker-compose exec app sh -c "php artisan db:seed"
```

- 清除 docker
```bash
docker-compose down -v
```


### Makefile (required docker & docker compose)
- 建立環境:
```bash
make build-local
```

- develop in watch mode:
```bash
make run-watch
```

- build pages in dev:
```bash
make run-dev
```

- install js packages: ( or just run `npm install`)
```bash
make npm-install
```

- 更新 database:
```bash
make run-migrate
```

- 建立假資料
```bash
make run-seed
```

- 清除 docker
```bash
make stop-dev
```
