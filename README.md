## Prerequisites
- PHP 7.2+, Composer
- MySql 5.7
## Installation
- Clone git repository git clone git@github.com:mansidesai631/upload-file-app.git.

- Run command `composer install` to install dependancies.

- Copy .env.example file to .env file. And change env configuration according to your system configuration. (change database username password, and any other config you fill it's required to setup.)

- Run migration: php artisan migrate from root directory. (assuming your mysql (v5.7) service is running. migration can cause some common issue if you are using older version of mysql.)

- Run php artisan key:generate to generate key for your application.
- Run command `npm install` to install front end dependancies.
- Run command `npm run dev`
- Run command `php artisan serve` for run the application.
