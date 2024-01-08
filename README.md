# Laravel Blog Posts for Beginners

Welcome to the Laravel Blog Posts for Beginners repository! This project is designed to help beginners get started with Laravel and build a simple blog application. Follow the steps below to set up the project and explore its features.

## Topics

1. **Resource Routes:** Learn how to define and use resource routes in Laravel.

2. **Resource Controllers:** Explore the use of resource controllers to handle CRUD operations efficiently.

3. **Implicit Route Model Binding:** Understand and implement implicit route model binding for cleaner controller methods.

4. **Accessors:** Learn how to use accessors to manipulate attribute values in your Eloquent models.

5. **Storage Public Disk for File Uploads:** Explore how to use Laravel's storage system and the public disk for handling file uploads.

6. **One to One Relationship (Inverse):** Implement and understand the inverse side of a one-to-one Eloquent relationship.

7. **Many to Many Relationship:** Dive into the concept of many-to-many relationships in Laravel Eloquent.

8. **Eager Loading (Solution to N+1 Query Problem):** Solve the N+1 query problem by implementing eager loading for efficient database queries.

9. **Route View:** Learn how to route directly to a view without a controller.

10. **Route Redirect:** Understand and implement route redirection for a better user experience.

11. **Bootstrap UI Package for Login:** Integrate Bootstrap UI package to enhance the visual appearance of the login functionality.

12. **Bootstrap Pagination:** Implement Bootstrap pagination for better navigation through paginated data.

## Prerequisites
Before you begin, make sure you have the following installed on your system:

- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)

## Installation

1. **Clone the repository to your local machine:**
    ```bash
    git clone https://github.com/Asad9299/laravel-blog-posts-for-beginners.git
    ```

2. **Navigate to the project directory:**
    ```bash
    cd laravel-blog-posts-for-beginners
    ```

3. **Install Composer dependencies:**
    ```bash
    composer install
    ```

4. **Install NPM dependencies and compile assets:**
    ```bash
    npm install && npm run dev
    ```

5. **Copy the example environment file:**
    ```bash
    cp .env.example .env
    ```

6. **Configure your `.env` file with appropriate database and other settings.**

7. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

## Test User

Use the following credentials to log in as a test user:

- **Email:** `asadmansuri6797@gmail.com`
- **Password:** `12345678`

## Running the Application

1. **Start the development server:**
    ```bash
    php artisan serve
    ```

2. **Visit [http://localhost:8000](http://localhost:8000) in your web browser.**

3. **Log in using the provided test user credentials.**

## Contributing

If you find any issues or have suggestions for improvement, feel free to open an issue or submit a pull request.

Happy coding!
