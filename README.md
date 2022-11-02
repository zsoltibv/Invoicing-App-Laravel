<p align="center">
  <img src="https://github.com/zsoltibv/laravel-invoicing-app/blob/main/public/img/hero.png" alt="accessibility text">
</p>

## About the project

Invoicing app made with Laravel PHP, Livewire, TailwindCSS and Flowbite components.
## Features

- Ability to register/login
- Ability to add/edit client/customer info via ANAF api, based on VAT number
- Ability to add credit card numbers on invoice
- Ability to add products with custom tax rate
- Generate invoices with all the elements above, plus the ability to select from multiple clients, add multiple products, add product units, add issued/due date etc.)
- Ability to view/download present or past invoices 
- Ability to cash in invoices
- Statistics 
- And much more to come

## Installation

1. Clone the repo and `cd` into it
1. `composer install`
1. `npm install && npm run dev`
1. Rename or copy `.env.example` file to `.env` and change database details
1. `php artisan migrate`
1. `php artisan storage:link`
1. `php artisan key:generate`
1. `php artisan serve`
1. Visit `localhost:8000` in your browser

## Used Packages

<a href="https://github.com/andalisolutions/laravel-anaf">andalisolutions/laravel-anaf</a><br>
<a href="https://github.com/LaravelDaily/laravel-invoices">LaravelDaily/laravel-invoices</a>
