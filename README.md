# MyBooksList
Symfony 6 application made for tracking personal reading activity.

# Running the Application

Make sure to start up your server before running the commands.

clone the repository and change directory
```
git clone https://github.com/rubenvanw/MyBooksList
cd MyBooksList
```

install composer
```
composer install
```

configure your database credentials in the .env file
[symfony database documentation](https://symfony.com/doc/current/doctrine.html)

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
symfony server start
```
