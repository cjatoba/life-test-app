## Passos para iniciar o projeto:

```shell
cp .env.example .env
docker-compose up -d
docker-compose exec laravel.test composer install
docker-compose exec laravel.test php artisan key:generate
```