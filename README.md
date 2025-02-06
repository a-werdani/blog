# Simple Blogging System

This is a simple blogging system built using **Laravel 11**, where users can create, edit, and delete blog posts. It provides a basic CRUD (Create, Read, Update, Delete) functionality for managing articles.

## Watch the Demo: Simple Blogging System

![Image](https://github.com/user-attachments/assets/ce7e059c-fa02-4cf0-90f4-be0cb1049341)

## Features

- **Home Page**: Displays a list of all blog posts.
- **Post Management**: Create, edit, update, and delete posts.
- **Post Details**: View individual blog posts.
- **Authentication**: User login and registration for managing posts (using the `laravel/ui` package).
- **Database Integration**: Stores blog posts using migration files.
- **Validation**: 
  - Title & description are required.
  - Title must be unique and at least 3 characters long.
  - Description must be at least 10 characters long.
  - Error messages will display for failed validation.
  - When updating a post, the title must remain unique unless it's unchanged.

## Requirements

- PHP >= 8.0
- Composer
- Laravel 11
- MySQL or any other database supported by Laravel

## Installation

Follow the steps below to set up and run the project:

### Step 1: Clone the Repository

Clone the project to your local machine using the following command:



```bash
git clone https://github.com/a-werdani/blog.git
```

### Step 2: Navigate to the Project Directory

After cloning the repository, navigate to the project directory:

```bash
cd blog
```

### Step 3: Install Dependencies

Run the following command to install all required dependencies:

```bash
composer install
```

### Step 4: Set Up Environment Variables
Copy the .env.example file to .env:

```bash
cp .env.example .env
```

### Step 5: Generate Application Key
Run the following command to generate a new application key:

```bash
php artisan key:generate
```


### Step 6: Run Migrations
Run the migrations to set up the database tables:

```bash
php artisan migrate
```

### Step 7: Install Laravel UI Package (For Authentication)
The project uses the laravel/ui package for authentication (login/registration).

Run the following command to install the package:

```bash
composer require laravel/ui
```
Then, generate the authentication scaffolding:

```bash
php artisan ui vue --auth
```
Run the npm install and build assets:

```bash
npm install
npm run dev
```

### Step 8: Serve the Application
Finally, run the Laravel development server:
```bash
php artisan serve
```
You can now access the application at http://localhost:8000.

