## Kursus Laravel 11: Basic to Intermediate

### System Requirement

- **Language :** PHP 8.2.21
- **Framework :** Laravel v11.0.0 or Above
- **Database :** Mysql 8.0.37
- **Composer :** Composer: v2.2 or Above
- **Node :** Node: v18.12.0 or above (LTS)

### Installation Guide

1. Download
    Download the files above and place on your server.

2. Environment Files
    To copy the `.env.example` file to `.env`, run the following command in your terminal:
   ```
   cp .env.example .env
   ```
   
3. Composer
   ```
   composer install
   ```

4. NPM/Yarn
    By running the following command, you will be able to get all the dependencies in your node_modules folder:

   ```
   yarn build
   ```

5. Create Database
    Change these lines to reflect your new database settings.
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE="Your database name"
    DB_USERNAME="your database username"
    DB_PASSWORD="your database password"
   ```

6. Artisan Commands
    Run the following command to generate migration tables.
   ```
    php artisan migrate
   ```
    Run the following command to generate fresh migration tables.(This will remove your current tables from Database and create new one.)
   ```
    php artisan migrate:fresh
   ```
    Run following database seeding command to create fake users in database for CRUD app.
   ```
    php artisan db:seed
   ```

### Date Training
- 29 Julai - 31 Julai 2024

