# Suit Pay Test

## Introdução

Este é um projeto desenvolvido com Laravel, Inertia e Vue.js.

Ele utiliza o Laravel Sail para facilitar o uso de containers Docker.

Siga os passos abaixo para executar o projeto em sua máquina local.

## Pré-requisitos

Certifique-se de que você tenha o Docker e o Docker Compose instalados em sua máquina.

-   [Docker](https://docs.docker.com/get-docker/)
-   [Docker Compose](https://docs.docker.com/compose/install/)

## Passos para a execução

1. Clone o repositório do GitHub:

```bash
git clone https://github.com/guilhermediniz1/suit_pay_test.git
cd suit_pay_test
```

2. Copie `.env.example` para `.env`

```bash
cp .env.example .env
```

3. No arquivo .env, configure as variáveis de ambiente, como as credenciais do banco de dados.

4. Execute os seguintes comandos para iniciar o ambiente Docker:

```bash
./vendor/bin/sail up -d
```

-   Também é possível adicionar um alias para facilitar o trabalho. Você pode adicionar o seguinte código
    em seu `.bashrc` ou `.zshrc`, por exemplo. Assim, poderá utilizar `sail` ao invés de `./vendor/bin/sail`

```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

5. Instale as dependências do projeto com `composer` e `npm`

```bash
./vendor/bin/sail composer install

./vendor/bin/sail npm install
```

6. Gere a chave da aplicação com o `artisan`

```bash
./vendor/bin/sail artisan key:generate
```

7. Execute as migrations para gerar a estrutura do banco de dados

```bash
./vendor/bin/sail artisan migrate
```

8. Execute o Seeder para popular o banco de dados com dados fictícios

```bash
./vendor/bin/sail artisan db:seed
```

## Desenvolvimento

Para iniciar o ambiente de desenvolvimento, basta executar os seguintes comandos:

```bash
./vendor/bin/sail artisan serve

./vendor/bin/sail npm run dev
```

Agora você pode acessar o aplicativo em seu navegador através do endereço:

```bash
http://localhost:8000
```

Agora você está pronto para começar a trabalhar no projeto em sua máquina local!

## Encerrando o Desenvolvimento

Para encerrar o ambiente de desenvolvimento basta utilizar o seguinte comando:

```bash
./vendor/bin/sail down
```
