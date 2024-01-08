# Laravel Blog Posts for Beginners

Welcome to the Laravel Blog Posts for Beginners repository! This project is designed to help beginners get started with Laravel and build a simple blog application. Follow the steps below to set up the project and explore its features.

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
