# Laravel Blog Project

This Laravel project is a simple blogging platform that allows users to read blog posts and administrators to manage posts via an admin portal. The application features responsive design, authentication, and CRUD operations for blog posts.

## Features

- **User Authentication**: Login and registration functionality for administrators.
- **Responsive Blog**: Users can view a list of all blog posts on the homepage.
- **Admin Dashboard**: Authenticated users can create, update, and delete posts.
- **Comments**: Users can add comments to posts.

## Installation

Follow these steps to get your development environment set up:

1. **Clone the repository**

   ```bash
   git clone this repo
   cd yourprojectname

2. **Install Dependencies**
     ```bash
   composer install
   npm install && npm run dev

3. **Set Up Environment File**
    ```bash
    cp .env.example .env

4. **Run the Server**
   ```bash
   php artisan serve
   

The SQLite database is pre-configured, so there is no need to migrate or seed the database.

## Default Admin Login

To access the admin dashboard, use the following credentials:

- **Email**: admin@admin.com
- **Password**: Pass1word

