# 🔐 SQL Injection Demo in PHP

This repository demonstrates how SQL injection vulnerabilities occur in traditional PHP applications, and how to protect against them using **prepared statements**.

---

## 📁 Branch Overview

- **`main`** – ⚠️ *Insecure Version*  
  Contains vulnerable PHP code that allows SQL Injection through unsanitized user input.

- **`secure-version`** – ✅ *Secure Version*  
  Uses prepared statements to safely handle user input and prevent injection.

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/sql-injection-demo.git
cd sql-injection-demo
````

### 2. Switch Branches

```bash
# Insecure version (vulnerable to SQL injection)
git checkout main

# Secure version (protected against SQL injection)
git checkout secure-version
```

### 3. Set Up the Database

Create a database and user table:

```sql
CREATE DATABASE demo_db;
USE demo_db;

CREATE TABLE user_table (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

INSERT INTO user_table (id, name, email) VALUES
(1, 'Alice', 'alice@example.com'),
(2, 'Bob', 'bob@example.com'),
(3, 'Charlie', 'charlie@example.com');
```

Update `dbconnect.php` with your actual DB credentials.

---

## ▶️ Running the App

Use PHP’s built-in server:

```bash
php -S localhost:8000
```

Then open your browser at: `http://localhost:8000`

---

## 💣 Try These SQL Injection Inputs (in the `main` branch)

* **Bypass with always-true logic**

  * ID: `0`
  * Name: `' OR 1=1 --`

* **Inject a fake user record**

  * ID: `0`
  * Name: `' UNION SELECT 999, 'Hacker', 'hacker@evil.com' --`

---

## 🧠 What You'll Learn

* How SQL injection attacks work
* How to exploit poorly written PHP code
* How to defend with parameterized queries
* Why **input validation** and **prepared statements** matter

---

## ⚠️ Disclaimer

This project is for **educational purposes only**.
Do **not** use the vulnerable version in production systems.
The insecure branch is intentionally flawed to help demonstrate real-world attack vectors.

---

## 👤 Author

**Isuru Indrajith**
Computer Engineering Undergraduate
University of Jaffna, Sri Lanka

