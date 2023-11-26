## Hospital Appointment Api

This is a simple appointment management system that operates in a medical clinic to manage patients'
appointments. They have thousands of patient records and each patient can have multiple appointments,
multiple invoices and multiple receipts.

## Requirements
    PHP version: 8.1
    MySQL
    Laravel version: 10.x

## Installation

#### 1. Download

      git clone https://github.com/Madusankaperera95/HospitalAppointmentApi.git

#### 2. Environment Files
This package ships with a .env.example file in the root of the project.

You must rename this file to just .env

Note: Make sure you have hidden files shown on your system.

#### 3. Composer
Laravel project dependencies are managed through the PHP Composer tool. The first step is to install the depencencies by navigating into your project in terminal and typing this command:

        composer install

#### 4. Create Database
You must create your database on your server and on your .env file update the following lines:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=

Change these lines to reflect your new database settings.

#### 4. Add data to the Database

In the database directory there is a folder called Sql. In the Sql Folder there is database.sql file please import it

#### 5. Artisan Commands

The first thing we are going to do is set the key that Laravel will use when doing encryption..

       php artisan key:generate

We are going to run the built in migrations to create the database tables that will needed to create the sanctum token:

        php artisan migrate

You should see a message for each table migrated.


To Run the application

      php artisan serve
