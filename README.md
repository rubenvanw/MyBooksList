# MyBooksList
Symfony 6 application made for tracking personal reading activity.

## Running the Application

make sure to start up your server before running the commands

clone the repository and change directory
```
git clone https://github.com/rubenvanw/MyBooksList
cd MyBooksList
```

install composer in the root of the directory
```
composer install
```

configure your database credentials in the .env file
[symfony database documentation](https://symfony.com/doc/current/doctrine.html)
![alt text](https://prnt.sc/iakRIBefl4BH "image")

after that create the database
```
php bin/console doctrine:database:create
```

run the migrations
```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

run the local symfony web server
```
symfony server:start
```
