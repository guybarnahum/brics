# Brics

Laravel 5.6 webapp for real estate micro investments.

# Description

Allow anyone around the world to participate in purchasing beautiful homes for rental income. 
Pick one of the properties the company is looking to buy, and contribute $10 or $1000 or $100,000 and get shares 
in the property purchased with the funds. Collect dividends from rental income. 
After 10 years the property is sold and investors split the proceeds of the shares. 

The shares are implemented on a etherium-like blockchain 'Brics', which would allow the purchaser to sell their 
shares and the dividends rights to the company or to 3rd parties at any time and in full anonimity.

# github installation 

Install php7.1, mysql 5.7, composer
Run 'composer install' on your cmd or terminal
Copy .env.example file to .env on root folder. 
Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. 
Run php artisan key:generate
Run php artisan migrate
Run php artisan serve
Go to localhost:8000

# Upgrading laravel 5.6 to boost 4.0

Make sure yarn and node are installed

>composer require laravelnews/laravel-twbs4
>php artisan preset bootstrap4-auth
>yarn && yarn dev

# [5.4-5.6] SQL error when migrating tables

laravel 5.6 Syntax error or access violation: 1071 Specified key was too long; max key leng th is 767 bytes (SQL: alter table `users` add unique `users_email_unique`

Laravel uses the utf8mb4 character set by default, which includes support for storing "emojis" in the database. If you are running a version of MySQL older than the 5.7.7 release or MariaDB older than the 10.2.2 release, you may need to manually configure the default string length generated by migrations in order for MySQL to create indexes for them. You may configure this by calling the Schema::defaultStringLength method within your AppServiceProvider:

use Illuminate\Support\Facades\Schema;

/**
* Bootstrap any application services.
*
* @return void
*/
public function boot()
{
    Schema::defaultStringLength(191);
}

Alternatively, you may enable the 'innodb_large_prefix' option for your database. Refer to your database's documentation for instructions on how to properly enable this option.

sudo nano /etc/my.cnf
(Be careful as mysql stores my.cnf in multiple places, see mysql --help | grep my.cnf )

Added to the end of the file:

default-engine=InnoDB

innodb-file-format=barracuda
innodb-file-per-table=ON
innodb-large-prefix=ON

collation-server=utf8mb4_unicode_ci
character-set-server=utf8mb4

Select all
Open in new window

Issue a mysql server restart: sudo service mysql restart

Run: mysql -u root -p and at the mysql prompt: show variables like 'innodb%';

