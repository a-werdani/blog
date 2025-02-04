# Simple Blogging System

This is a simple blogging system built using **Laravel 11**, where users can create, edit, and delete blog posts. It provides a basic CRUD (Create, Read, Update, Delete) functionality for managing articles.

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
git clone https://github.com/yourusername/simple-blogging-system.git

```

### Step 2: Navigate to the Project Directory

After cloning the repository, navigate to the project directory:

```bash
cd simple-blogging-system
