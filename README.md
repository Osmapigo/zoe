# Zoe Financial Full-Stack Developer Test

Implementatipn of the excersise in Laravel of an application that displays the match between two groups: two agents and a list of contacts. The match is based in the closest agent to the client, using only the available ZIP codes for both of them.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

You should have PHP@7.1 or higher, composer and a local database in MySQL. Configure the .env file to match your database name, user and password.

### Installing and running

Download the project

```
git clone https://github.com/Osmapigo/zoe.git
```

It is possible you need to run the composer update command: 

```
composer update
```

If you have your environment configured, we can use the migration tool of Laravel to create the basic table structure and seed the table with the clients from the original csv.

```
php artisan migrate --seed
```

To run the application, we can use the built in server of laravel and test it in http://127.0.0.1:8000

```
php artisan serve
```

## Running the tests

To run the unit test, you can run

```
vendor/bin/phpunit --filter ZipcodeTest
```

## Built With

* [Laravel 5.8](https://laravel.com/docs/5.8) - The web framework used
* [ZipCode](https://github.com/antonioribeiro/zipcode) - Wrapper for ZIP to coordinates conversion

## Acknowledgments

* We are using the test credentials for http://api.zippopotam.us/ because I couldn't find a registration page.
* To advoid the slow requests in every comparison, we are storing the coordinates in the database for each client. When you hit the home page, it will store the coordinates for those users that doesn't have. 
* There was a ZIP code in the csv that the http://api.zippopotam.us/ API couldn't find, so I replaced it, even when the program can handle this situation. A better API could be the google maps service, but for time constrains was not implemented int that way.
* As you can imagine from the last point, the first call of the program will take a little bit longer that expected, while it populate the missing coordinates for the clients.
