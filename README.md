# Laravel Task Management

This is a simple Laravel web application for task management, with the added functionality of associating tasks with projects.

## Features

- **Task Management:**
  - Create, edit, and delete tasks.
  - Reorder tasks with drag and drop functionality.
- **Project Functionality:**
  - Associate tasks with projects.
  - View and select projects when creating tasks.

## Prerequisites

Before running the application, make sure you have the following installed:

- PHP >= 7.3
- Composer
- MySQL
- Node.js and npm

## Setup

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/adnangaidi/tasks-management.git

2. **Install Dependencies:**
 ```bash
composer install
```

2.**Prerequisites:**
Create a MySQL database for your application.
Copy the .env.example file to .env and update the database configuration.


3. **Database Setup:**
 ```bash
php artisan key:generate
```
```bash
php artisan migrate
```
4.**Run the Application:**
```bash
php artisan serve
```



Usage
Open your web browser and go to http://localhost:8000.
Create tasks, associate them with projects, and manage your task list.
Contributing
Feel free to contribute to this project. Fork the repository, make your changes, and submit a pull request.

License
This project is open-source and available under the MIT License.

