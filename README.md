Books
This is a project built using Laravel 11

Features
List of books with filter

Top 10 most famous author

Input rating

System Requirements
Laravel framework version 11.0

PHP version 8.3.16

Composer

MySQL

Instructions
Configure the database in the .env file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_store 
DB_USERNAME=your_username
DB_PASSWORD=your_password

Run the database migrations:
php artisan migrate

Run the seeders to populate initial data:
php artisan db:seed

Start the Laravel development server:
php artisan serve

Access the application in your browser:
http://127.0.0.1:8000/ (Access the List of books with filter)

http://127.0.0.1:8000/top-authors (Access the List of top 10 most famous author)

http://127.0.0.1:8000/rate (Access the Input rating)
