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

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd mini-crm
