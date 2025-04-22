# Laravel Music Bands CRM 🎸

This project was developed as the final assignment for the **Web Programming - Server Side** course in the Front-End program at CESAE Digital. "Laravel Music Bands CRM" is a customer relationship management system adapted for managing music bands and their albums, designed to showcase back-end development skills using Laravel, PHP, and MySQL.

## 📋 Project Overview

Laravel Music Bands CRM is a responsive web application that allows users to manage music bands and albums with different permission levels. The system includes multiple features showcasing different aspects of the application:

### 🔐 Authentication System
- Registration of new users
- Login for existing users
- Personalized dashboard for authenticated users

### 🎵 Band Management
- View all registered bands
- Band details (name, photo, number of albums)
- Complete CRUD functionality (Create, Read, Update, Delete)

### 💿 Album Management 
- View albums by band
- Album details (name, image, release date)
- Complete CRUD functionality

### 👥 Access Levels
- **Administrator**: Can insert, edit, and delete bands and albums
- **Authenticated User**: Can edit information
- **Visitor**: View-only access to content

## ✨ Features

- Fully responsive design that adapts to different screen sizes
- Bootstrap integration for modern, mobile-first layouts
- Navigation bar with dropdown menu for mobile devices
- Band and album showcase with details
- Grid layout with cards for bands and albums
- Search functionality
- Form validation
- Custom styling to match the music theme

## 🛠️ Technologies Used

- **Laravel**: PHP framework for web development
- **MySQL**: Database management system
- **Blade**: Laravel's templating engine
- **Bootstrap**: Front-end framework for responsive design
- **PHP 8.1+**: For server-side logic
- **Composer**: For dependency management
- **NPM**: For asset compilation

## 🚀 Requirements

- PHP 8.1 or higher
- Composer
- MySQL or other database supported by Laravel
- Node.js and NPM (for asset compilation)

## 🔄 Installation

1. Clone the repository:
   ```
   git clone https://github.com/your-username/laravel-music-bands-crm.git
   cd laravel-music-bands-crm
   ```

2. Install dependencies:
   ```
   composer install
   npm install
   npm run dev
   ```

3. Configure the environment:
   - Create a `.env` file based on `.env.example`
   - Configure your database credentials in the `.env` file

4. Run migrations and seeders:
   ```
   php artisan migrate
   php artisan db:seed
   ```

5. Create a symbolic link for storage:
   ```
   php artisan storage:link
   ```

6. Start the server:
   ```
   php artisan serve
   ```

## 📁 Database Structure

The system uses the following main tables:
- `users`: Stores user information
- `bands`: Stores band information
- `albums`: Stores album information


## 👨‍💻 Author

This project was developed by Claudia Alfieri for educational purposes.

## 📝 Contribution

Contributions are welcome through pull requests.
