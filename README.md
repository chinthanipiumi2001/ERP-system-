<h1 align = "center">
ERP System - Full Stack Developer Assignment
</h1> 

Project Overview

✅ This project is an ERP (Enterprise Resource Planning) system built using PHP and MySQL. It allows for the management of customers and items, with the ability to create, update, delete, and search system data. The system also generates reports related to invoices and items.

## Assumptions Made

1. Customer Data

The District field is assumed to be a free-text field where the user can input any district.

The contact number is validated as a 10-digit numeric string.

2. Item Categories

Predefined categories (e.g., Electronics, Furniture, Clothing) and subcategories (e.g., Mobile, Laptop, Sofa) are used. These can be easily extended by modifying the code or adding them dynamically from the database.

3. Form Validation 

Basic form validation is implemented using JavaScript for mandatory fields and numeric validations (like contact numbers and item prices). 

4. Invoice Reporting 

The system assumes invoices and related item information are stored in a database table with a many-to-one relationship between invoices and customers/items and date ranges for reports are selected by the user to filter invoice data.

## Technology Stack 
📌️ Backend -: PHP <br>
📌️Frontend: HTML, CSS (Bootstrap for UI), JavaScript<br>
📌️ Database: MySQL
</br>

## Project Setup 
- Prerequisites

    1. XAMPP/WAMP (or any local server with PHP and MySQL support)
    2. PHP 7.4+
    3. MySQL

## Step to Setup the project 
1. Clone or download the repsitory 
    - If using Github 
    ```bash
   git clone https://github.com/chinthanipiumi2001/ERP-system-.git
   ```
Alternatively, download the ZIP file and extract it into the web server’s root directory (e.g., C:/xampp/htdocs/erp-system for XAMPP).

2. Import the database

- Open phpMyAdmin (usually available at http://localhost/phpmyadmin).

- Create a new database named erp_db.
- Import the provided SQL file (erp_db.sql) into this database. This file contains the necessary tables and initial data.

- Click on the Import tab in phpMyAdmin, choose the erp_db.sql file, and click Go. 

3. Configure the Database Connection 







