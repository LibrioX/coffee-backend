# Coffee Beanie Backend

This is the backend for the Coffee Beanie project, which handles the management of products and blogs.

## 1. Live Production

You can access the live version of the admin panel via the following link:

[Live Admin Panel](https://dandycandra.site/admin/login)

Login using the following credentials:
- **Email:** admin@gmail.com
- **Password:** admin

## 2. Features

- **CRUD Products**  
  Create, Read, Update, and Delete coffee products.

- **CRUD Blogs**  
  Create, Read, Update, and Delete blog articles.

## 3. API

- **Get All Products**  
  Fetch the list of all coffee products.

- **Get All Blogs**  
  Retrieve a list of all blog articles.

- **Get Detail Blog**  
  Fetch the detailed information of a specific blog article.

## 4. Installation

To run the backend locally, follow the steps below:

1. Clone the project repository:
   git clone https://github.com/your-username/coffee-beanie-backend.git
2. Install the required dependencies using Composer:
   composer install
3. Set up the environment file by copying .env.example to .env:
   cp .env.example .env
4. Run the migration:
   php artisan migrate
5. Create a symbolic link for storage:
   php artisan storage:link
6. Run the development server:
   php artisan serve
