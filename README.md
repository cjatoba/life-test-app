## Passos para iniciar o projeto:

```shell
cp .env.example .env
```

Alterar a chave LOCAL_USER no arquivo .env para o nome do usuário local
Adicionar uma senha na chave DB_PASSWORD no arquivo .env


```shell
docker-compose up -d
docker-compose exec app
composer install
php artisan key:generate
```