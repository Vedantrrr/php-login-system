# 🔐 PHP Login & Signup System

A simple user authentication system using PHP and MySQL. Includes secure password hashing and session-based login.

## 🛠️ Tech Stack
- PHP
- MySQL
- HTML
- Sessions
- Password Hashing

## 🔧 Features
- User registration and login
- Passwords hashed with `password_hash()`
- Sessions to manage login/logout
- Simple dashboard after login

## 🗄️ Database Setup

Create a database named `login_system` and run:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);
