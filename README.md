# ITP-Project
Website for the International Homoeopathic Hospital and Research Institute (pvt) Ltd.

## Prerequisites
- Git
- Composer
- XAMPP

## Instructions

1. First clone the repo using the following git command in your git bash(inside the xampp\htdocs)
```
git clone -b secondary https://github.com/LakshanPerera/ITP-Project.git
```

2. CD into the ITP-Project and install the composer dependencies
```
cd ITP-Project
composer install
```

3. Make a .env file by copying the .env.example file
```
cp .env.example .env
```
##### Note
- If you are using different database name and password update them in the `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=itp <-- Replace this with your database name
DB_USERNAME=root <-- Replace this with your username
DB_PASSWORD= <-- Add your database password(if there's any)
```
- If you don't have a MySQL Database in your computer make one by visting `http://localhost/phpmyadmin`

4. Generate a new key by running the following command
```
php artisan key:generate
```

5. Migrate the databases
```
php artisan migrate
```

6. To run the app, run the following command and goto the link given(CTRL + click the link)
```
php artisan serve
```
