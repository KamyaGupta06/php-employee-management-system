# Employee Management System (PHP & MySQL)

A simple web-based **Employee Management System** built using **Core PHP**, **MySQL**, **HTML**, **CSS**, and **JS**. This project is designed to manage employee records with basic authentication and CRUD functionality.

---

## 🔐 Authentication Features

- 👤 **One-time Admin Registration**
- 🔐 **Login System with Sessions**
- 🚪 Logout Functionality

---

## 👥 Employee Management Features

- ➕ Add New Employee
- 📋 View All Employees
- 🔍 Search Employees (by name or email)
- ✏️ Update Employee Details
- ❌ Delete Employee

---

## 🗂️ Project Structure

```plaintext
employee-management-system/
│
├── db.php               # Database connection
├── register.php         # Admin registration form (used once)
├── register_process.php # Handles admin registration logic
├── login.php            # Login form
├── auth.php             # Login logic
├── logout.php           # Logout and session destroy
├── dashboard.php        # Main page after login
├── addEmp.php           # Add employee form + insert logic
├── viewEmp.php          # Display all employees + search
├── updateEmp.php        # Edit employee form + update logic
├── deleteEmp.php        # Delete employee by ID
└── README.md            # Project description
```

## 🧑‍💻 Technologies Used

- **Frontend**: HTML, CSS, JS
- **Backend**: PHP (Procedural)
- **Database**: MySQL
- **Server**: XAMPP(localhost)
- **Security**:
  - Sessions for login state
  - Password hashing 
  - Prepared Statements (MySQLi)

---

## ⚙️ Setup Instructions

### 🔧 Prerequisites
- PHP ≥ 7.4
- MySQL
- Apache Server (XAMPP / WAMP / LAMP)

### 🚀 Steps to Run Locally

1. **Clone the Repository**  
```bash
git clone https://github.com/KamyaGupta06/php-employee-management-system.git
cd php-employee-management-system
```
2. **Start Apache and MySQL using XAMPP**
   - Open **XAMPP Control Panel**  
   - Click **Start** next to **Apache** and **MySQL**
  
3. **Create & Import Database**
   - Open `phpMyAdmin`
   - Create a new database named `employeedb`
   - Import the `employeedb.sql` file included in this repository
     - Click `Import` tab
     - Choose `employeedb.sql` and click **Go**
       
4. **Configure Database Connection**  
   - Open `db.php`  
   - Update the database credentials if needed (host, username, password, database name, port)

```php
$conn = new mysqli("localhost", "root", "", "employeedb", 3307);
```
5. **Run the Project**
  - Open your browser and visit:
```bash
http://localhost/php-employee-management-system/login.php
```
---

## 🗄️ Database Tables

### 1. `user` table (for admin login)
| Column     | Type         | Description         |
|------------|--------------|---------------------|
| id         | INT (PK)     | Auto-increment ID   |
| username   | VARCHAR(50)  | Admin username      |
| password   | VARCHAR(255) | Hashed password     |

### 2. `emp` table (employee records)
| Column     | Type         | Description             |
|------------|--------------|-------------------------|
| empid      | INT (PK)     | Employee ID             |
| empname    | VARCHAR(100) | Employee name           |
| empmail    | VARCHAR(100) | Email                   |
| salary     | FLOAT        | Salary                  |
| dept       | VARCHAR(50)  | Department name         |

---

## Author

Kamya Gupta  
[GitHub Profile](https://github.com/KamyaGupta06)
