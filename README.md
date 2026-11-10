# Shopi

**A Laravel and Livewire storefront with cart, checkout and invoices.**

[Overview](#overview) · [Local setup](#local-setup) · [Code guide](#code-guide) · [Verification](#verification)

## Overview

An e-commerce application built with Laravel 10, Livewire 2 and Filament 2. It includes product browsing, cart interactions, authenticated checkout and order invoices.

## Features

- Product catalogue and product detail pages.
- Cart quantity controls and item removal.
- Authenticated checkout and order confirmation pages.
- Customer dashboard with invoice and PDF invoice routes.
- Filament administration tooling and Stripe-related dependencies.

## Technology

| Layer | Stack |
| --- | --- |
| Backend | PHP `^8.1` · Laravel `^10.8` |
| Interface and tooling | Livewire 2 · Filament 2 · Tailwind CSS · Vite · Stripe |
| Data | Eloquent ORM · MySQL in the supplied environment template |

Version constraints above come from [composer.json](composer.json) and [package.json](package.json). Use a PHP runtime compatible with `composer.lock`, Composer 2, and a Node.js/npm version compatible with the declared asset tooling. Enable the PHP extensions required by Composer and the selected database driver.

## Local setup

```bash
git clone https://github.com/Moelnabawy8/Shopi-master.git
cd Shopi-master
composer install
cp .env.example .env
php artisan key:generate
npm ci
```

Create an empty local MySQL database. Set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in your local `.env`; keep `DB_CONNECTION=mysql`. Set `APP_URL=http://127.0.0.1:8000`. For local mail inspection, set `MAIL_MAILER=log` instead of configuring a live mail provider.

```bash
php artisan migrate
php artisan storage:link
npm run build
php artisan serve
```

Open [the local application](http://127.0.0.1:8000). For asset hot reload, run `npm run dev` in a second terminal while the PHP server remains running.

## Local demo notes

The home page is `/`, product pages are `/product/{product_id}`, and the cart is `/cart`. Checkout and the customer dashboard require authentication.

Review the sample-data seeder before optionally running `php artisan db:seed`. Configure payment credentials locally in test mode before exercising checkout. Filament access also depends on the application's account configuration.

## Code guide

| Path | Responsibility |
| --- | --- |
| [`routes/web.php`](routes/web.php) | Storefront, checkout and invoice routes |
| [`app/Http/Livewire/`](app/Http/Livewire/) | Storefront and cart components |
| [`app/Models/`](app/Models/) | Products, categories, orders and billing details |
| [`database/seeders/DatabaseSeeder.php`](database/seeders/DatabaseSeeder.php) | Local catalogue sample data |

## Verification

A PHPUnit configuration and Laravel test scaffolding are present. Payment, cart and invoice flows should be verified with dedicated feature tests.

Use an isolated testing database and review [phpunit.xml](phpunit.xml) before running the suite. Database-resetting tests must point to disposable data.

```bash
php artisan test
```

To check PHP formatting without modifying files:

```bash
./vendor/bin/pint --test
```

Build the front-end assets with `npm run build` after changing JavaScript, CSS or templates. Keep local configuration in `.env` and commit only configuration examples.
