# Mini CRM

Mini CRM is a simple application built with Laravel, Vue.js, and Tailwind CSS for managing companies and their employees. This project provides basic CRUD functionality to manage company and employee information.

## Features

- **Authentication**: Basic Laravel authentication with an administrator login.
- **CRUD Operations**:
  - Companies: Create, Read, Update, Delete.
  - Employees: Create, Read, Update, Delete.
- **Database Management**:
  - Migrations to create necessary database schemas.
  - Database seeds to create the first user.
- **File Storage**: Upload and store company logos.
- **Pagination**: Display company and employee lists with pagination (10 entries per page).
- **Validation**: Use Laravel's validation functions to ensure data integrity.

## Technologies Used
- **PHP** : php "^8.1",
- **Backend**: Laravel 
- **Frontend**: Vue.js, Tailwind CSS
- **Database**: MySQL

## Database Structure

### Companies Table

| Field     | Type     | Description                              |
|-----------|----------|------------------------------------------|
| Name      | String   | Required. Name of the company.          |
| Email     | String   | Email address of the company.           |
| Logo      | String   | Path to the company logo (min 100x100).|
| Website   | String   | Website URL of the company.             |

### Employees Table

| Field       | Type     | Description                                   |
|-------------|----------|-----------------------------------------------|
| First Name  | String   | Required. First name of the employee.        |
| Last Name   | String   | Required. Last name of the employee.         |
| Company     | Foreign  | Foreign key to the Companies table.          |
| Email       | String   | Email address of the employee.               |
| Phone       | String   | Phone number of the employee.                |

## Installation

-   Create a local copy of the repository. 
    ```
        git clone https://github.com/muhammadlaraibsaeed/programmer-hut
    ```
-   Make sure you have xxamp or something similiar.
-   Create a database, name it 'laravel_ikionic'.
-   Setup .env file `cp .env .example .env`
-   Run `composer install` and `php artisan key:generate`.
-   When you see the login page, head over the register page, create an account and log in. After that you wil able do following thiings Add ,Comments,Like,Dislikes FeedBack.
-   `php artisan migrate` For Migration Table Into Database
-   You can utilize the database seeder by running the command `php artisan db:seed` to generate synthetic or test data for application.
