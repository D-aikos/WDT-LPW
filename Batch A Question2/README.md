# PHP Session & File Handling

### Login System with PHP Session Management

---

# Project Overview

This project is a Login System built using:

* PHP
* HTML
* CSS
* Sessions
* File Handling

The system validates user credentials from a text file and manages login sessions using PHP.

Features:

* User login authentication
* Session management
* Protected dashboard page
* Logout functionality
* File handling using `users.txt`

---

# Files Used

```text
php-login-system/
│
├── login.php
├── dashboard.php
├── logout.php
├── style.css
└── users.txt
```

---

# Technologies Used

* PHP
* HTML5
* CSS3
* PHP Sessions
* PHP File Handling
* Apache Server (XAMPP)

---

# User Credentials File

The `users.txt` file stores usernames and passwords.

Example:

```text
admin,admin123
john,password123
```

---

# PHP Concepts Used

## Session Management

* `session_start()`
* `$_SESSION`
* `session_destroy()`

Used for maintaining login state.

---

## File Handling

* `file()`
* `explode()`
* `trim()`

Used for reading and validating user data from a text file.

---

# Authentication Flow

1. User enters username and password.
2. PHP reads data from `users.txt`.
3. Credentials are validated.
4. Session is created.
5. User is redirected to dashboard.
6. Logout destroys session.

---

# How to Run the Project

## Step 1 — Install XAMPP

Install:

* XAMPP

---

## Step 2 — Start Apache

Open XAMPP Control Panel.

Click:

```text
Start → Apache
```

Apache must turn green.

---

## Step 3 — Move Project Folder

Copy project folder into:

```text
C:\xampp\htdocs\
```

Example:

```text
C:\xampp\htdocs\php-login-system
```

---

## Step 4 — Open in Browser

Open browser and visit:

```text
http://localhost/php-login-system/login.php
```

---

# Test Credentials

```text
Username: admin
Password: admin123
```

---

# Conclusion

This project demonstrates how PHP sessions and file handling can be used to build a basic authentication system with protected pages and user session management.
