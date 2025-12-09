# 🗒️ Mini-Notes Website (PHP)

A full-featured **Notes Management Web Application** built with **PHP** and **MySQL**.  
This project allows users to **register**, **log in**, and manage their own **personal notes** securely.  
Each user can create, edit, and delete notes, as well as update their profile information.

---

## 🚀 Features
- 👤 **User Authentication System**
  - Register new users
  - Log in and log out
  - Passwords stored securely (hashed)
  - Edit user profile data
  - Send messages via contact page
- 🗒️ **Notes Management**
  - Add, edit, view, and delete notes
  - Each user sees only their own notes
- 👑 **Admin Dashboard**
  - View and delete the contacts messages
- 💾 **Database Integration**
  - MySQL database to store users and notes
- 🧭 **Clean UI**
  - Simple and responsive interface

---

## 🧰 Technologies Used
- **Frontend:** HTML, CSS, JavaScript, Tailwind CSS
- **Backend:** PHP (Native)
- **Database:** MySQL

---

## ⚙️ Installation & Setup

1. **Clone or download** this repository:
   ```bash
   git clone https://github.com/zainnada/Mini-Notes.git
   
2. Move the project files into your **local web server** directory:
(e.g., htdocs for XAMPP or www for Laragon)

3. **Create** a new **MySQL database** (for example: notesDB).

4. **Import** the database file included in the project: notesDB.sql

5. **Update** your database connection in config.php:
   ```php
   <?php
    'Database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'notesDB',
        'charset' => 'utf8mb4'
    ]
    ?>
  - if you want to edit the username and password, update them in Database.php constructor.

6. **Start** the PHP built-in development server (serving from the public directory):
   ```bash
   php -S localhost:8888 -t public
   
7. **Open** your browser and visit:
http://localhost:8888/


>This project is a simple notes management web application built as part of Jeffrey Way’s PHP for Beginners series on Laracasts.  This project demonstrates the core concepts of PHP, including routing, form handling, validation, and database using PDO. It’s built from scratch without frameworks to strengthen your understanding of how PHP works behind the scenes.
