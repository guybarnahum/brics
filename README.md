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

