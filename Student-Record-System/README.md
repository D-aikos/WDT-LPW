# Student Record System

A full-stack Student Record Management System developed using PHP, MySQL, Bootstrap 5, JavaScript, jQuery, and AJAX.

The system provides authentication, student management, CRUD operations, live search, and responsive UI features.

---

# Features

- Admin Login Authentication
- PHP Session Management
- Responsive Dashboard
- Add Student Records
- Edit Student Records
- Delete Student Records
- AJAX-based Student Fetching
- Live Search Functionality
- File Upload Support
- Client-side Validation
- Server-side Validation
- Bootstrap Modal Confirmation
- Dynamic Table Rendering
- Responsive Design

---

# Technologies Used

## Frontend
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- jQuery
- AJAX

## Backend
- PHP
- MySQL
- mysqli

## Server Environment
- XAMPP
- Apache Server
- phpMyAdmin

---

# Project Structure

```text
Student-Record-System/
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   ├── js/
│   │   ├── validation.js
│   │   └── students.js
│
├── uploads/
│
├── config.php
├── login.php
├── logout.php
├── index.php
├── add_student.php
├── view_students.php
├── fetch_students.php
├── delete_student.php
├── edit_student.php
├── search_students.php
└── README.md
```

---

# Database Setup

## Step 1 — Create Database

Open phpMyAdmin and create database:

```sql
CREATE DATABASE student_db;
```

---

## Step 2 — Create `students` Table

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    phone VARCHAR(15),
    course VARCHAR(100),
    dob DATE,
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Step 3 — Create `admin_users` Table

```sql
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
```

---

## Step 4 — Insert Admin User

```sql
INSERT INTO admin_users(username, password)
VALUES ('admin', 'admin123');
```

---

# How to Run the Project

## Step 1 — Install XAMPP

Install:
- XAMPP

Start:
- Apache
- MySQL

---

## Step 2 — Move Project Folder

Copy project folder into:

```text
C:\xampp\htdocs\
```

Example:

```text
C:\xampp\htdocs\Student-Record-System
```

---

## Step 3 — Open phpMyAdmin

Visit:

```text
http://localhost/phpmyadmin
```

Create database and tables using the SQL queries provided above.

---

## Step 4 — Configure Database Connection

Open:

```text
config.php
```

Update credentials if needed:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "student_db";
```

---

## Step 5 — Run the Project

Open browser and visit:

```text
http://localhost/Student-Record-System/login.php
```

---

# Default Login Credentials

```text
Username: admin
Password: admin123
```

---

# Modules

## Authentication Module
- Login
- Logout
- Session Protection

## Dashboard Module
- Total Student Count
- Navigation Cards
- Responsive Layout

## Add Student Module
- Form Validation
- File Upload
- Prepared Statements

## View Students Module
- AJAX Table Rendering
- Bootstrap Table
- Dynamic Content Loading

## Delete Student Module
- AJAX Delete Request
- Bootstrap Confirmation Modal
- Dynamic Row Removal

## Live Search Module
- Real-time Search
- AJAX Keyup Requests
- Dynamic Filtering

## Edit Student Module
- Pre-filled Form
- Student Data Update

---

# Validation Rules

## Name
- Minimum 3 characters
- Alphabets only

## Email
- Valid email format required

## Phone
- Must contain exactly 10 digits

## DOB
- Future dates not allowed

## Photo
- JPG and PNG only

---

# Concepts Used

- CRUD Operations
- PHP Sessions
- AJAX Requests
- DOM Manipulation
- Responsive Design
- File Upload Handling
- MySQL Database Connectivity
- Prepared Statements
- Dynamic Rendering
- jQuery Effects

---

# Challenges Faced

- Managing AJAX requests
- Handling dynamic table rendering
- Implementing session-based authentication
- Managing file uploads
- Debugging path and filename issues
- Integrating frontend and backend components

---

# Conclusion

This project demonstrates the implementation of a complete full-stack Student Record Management System using PHP, MySQL, Bootstrap, JavaScript, jQuery, and AJAX.

The system provides authentication, CRUD operations, live search, responsive UI, and asynchronous functionality, helping in understanding practical full-stack web development concepts.