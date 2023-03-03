## Passos para iniciar o projeto:

```shell
cp .env.example .env
```

- Adicionar uma senha na chave DB_PASSWORD no arquivo .env

- Executar o comando composer install utilizando o docker

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

```shell
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
```

Acessar o projeto em `http://localhost`