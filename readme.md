# Broker's CRM

A demo application based on Ping CRM to illustrate how to integrate WebRTC on Laravel project with Vue.js and how it works.

![Animação](https://user-images.githubusercontent.com/38821945/204041845-6767c731-fefe-4970-a84b-777a8c0f5afa.gif)

## Installation

Clone the repo locally:

```sh
git clone git@github.com:Unix-User/demo.git brokercrm
cd brokercrm
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm ci
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit Brokers CRM in your browser, and login with:

- **Username:** johndoe@example.com
- **Password:** secret

## Running tests

To run the Ping CRM tests, run:

```
phpunit
```
