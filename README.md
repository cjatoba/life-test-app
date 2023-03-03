## Passos para iniciar o projeto:

- Clonar o projeto;
```shell
git clone https://github.com/cjatoba/life-test-app
```

- Acessar o projeto:
```shell
cd life-test-app
```

- Copiar o conteúdo do arquivo `.env.example` para `.env`:
```shell
cp .env.example .env
```

- Adicionar uma senha na chave DB_PASSWORD no arquivo .env

- Instalar as dependências do composer utilizando o docker:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

- Subir os containers utilizando o Laravel Sail:
```shell
./vendor/bin/sail up -d
```

- Gerar a chave APP_KEY:
```shell
./vendor/bin/sail artisan key:generate
```

- Rodar as migrations:
```shell
./vendor/bin/sail artisan migrate
```

Acessar o projeto na porta 8989: `http://localhost:8989`