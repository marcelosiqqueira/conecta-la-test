# 🚀 Laravel 11 com PHP 8.4 e Docker Compose

Este projeto é um ambiente Laravel 11 totalmente containerizado utilizando Docker Compose, PHP 8.4, MySQL 8.0 e Nginx. Com esse setup, você pode rodar sua aplicação de forma rápida e eficiente, sem precisar instalar dependências manualmente na sua máquina.

🛠️ Tecnologias Utilizadas
* Laravel 11
* PHP 8.4 (FPM)
* Docker & Docker Compose
* MySQL 8.0
* Nginx


## 🚀Como Rodar o Projeto

### 1️⃣ Pré-requisitos
Antes de começar, você precisa ter instalado na sua máquina:

* Docker
* Docker Compose

### 2️⃣ Clonar o Repositório

```bash
git clone https://github.com/marcelosiqqueira/conecta-la-test.git

cd conecta-la-test
```
### 2️⃣ Criar o Arquivo .env
Caso ainda não tenha um arquivo .env, crie um com base no .env.example:

```bash
cp .env.example .env
```

⚠️ Importante: Verifique as credenciais do banco de dados no .env e ajuste conforme necessário:

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=user
DB_PASSWORD=password
```

### 4️⃣ Subir os Containers

Agora, basta rodar o seguinte comando para subir os containers:

```bash
docker-compose up -d
```

Isso iniciará os serviços:

* PHP 8.4 (FPM)
* MySQL 8.0
* Nginx


### 5️⃣ Instalar as Dependências do Laravel

Acesse o container da aplicação e instale as dependências:

```bash
docker exec -it laravel_app bash
composer install
```

### 6️⃣ Gerar a Key do Laravel

Ainda dentro do container:

```bash
php artisan key:generate
```


### 7️⃣ Rodar as Migrations com Seeders

```bash
php artisan migrate:fresh --seed
```

### 🔥 Testando a Aplicação

Após subir os containers e configurar o Laravel, acesse no navegador:

```bash
http://localhost:8000
```



