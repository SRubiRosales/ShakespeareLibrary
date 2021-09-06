For run this project just follow the next steps:

1. Clone GitHub repo using the repository url.

Find a directory (folder)on your computer where you want to store the project. For example, htdocs if you are using xampp. That is where you will run the following command, which will pull the project from github and create a copy of it on your local computer at the “htdocs” directory.

git clone SRubiRosales/ShakespeareLibrary

2. Change directory

To execute the rest of the commands, you will need to be inside that project . Type cd ShakespeareLibrary to move to the working location of the project file we just created.

3. Install Composer Dependencies
Running composer, checks the composer.json file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires.

composer install

4. Install NPM Dependencies
Just like step 4, where we installed the composer PHP packages, installing the Javascript (or Node) packages is required. All packages that a repo requires is listed in the packages.json file which is submitted to the github repo.

npm install

5. Create a copy of your .env file
.env files are not committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project have. So we will make a copy of the .env.example file and create a .env file from it.

cp .env.example .env

6. Generate an app encryption key
Every laravel project requires an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.

php artisan key:generate

7. Create an empty database for our application
Create an empty database called "shakespeare"

8. Add database information to allow Laravel to connect to the database.
In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the details of the database you just created. This will allow us to run migrations and seed the database.

9. Migrate the database
After filling the details in the .env type this:
php artisan migrate
Check your database to make sure everything migrated.

10. Seed the database
After the migrations are complete and you have the database structure required, then you can seed the database (which means add dummy data to it).
php artisan db:seed

11. Run the app
Use the serve Artisan command:

php artisan serve

By default the HTTP-server will listen to port 8000. However if that port is already in use or you wish to serve multiple applications this way, you might want to specify what port to use. 

12. Log in
Use "admin@mail.com" as email and "password" as password por log in.
Now you can test the application

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
