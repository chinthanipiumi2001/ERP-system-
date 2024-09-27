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

<img src="./img/img 2.png" width="600" height="300">

- Open phpMyAdmin (usually available at http://localhost/phpmyadmin).

- Create a new database named erp_db.
- Import the provided SQL file (erp_db.sql) into this database. This file contains the necessary tables and initial data.

- Click on the Import tab in phpMyAdmin, choose the erp_db.sql file, and click Go. 

3. Configure the Database Connection 
    - In the includes/dump.php file, ensure the following credentials match your local setup

```bash
  $servername = "localhost";
  $username = "root";    // Replace with your MySQL username
  $password = "";        // Replace with your MySQL password
  $dbname = "dump.sql";    // Name of the database
  ```
## Project Structure 
<img src="./img/img 1.png" width="250" height="700">

## How to Use 
1. Register customer 

- Go to http://localhost/backend/customer.php
- Fill in the required fields (Title, First Name, Last Name, Contact Number, District).
- Submit the form to store the data in the database.

<img src="./img/img 3.png" width="600" height="300">

2. Register an Item
- Go to http://localhost/erp-system/item.php

- Fill in the required fields (Item Code, Name, Category, Sub Category, Quantity, Unit Price).
Submit the form to store the item in the database.

<img src="./img/img 3.png" width="600" height="300">

3. View Registered Customers

- Go to http://localhost/erp-system/customer_list.php
- You will see a list of all registered customers.

4. Additional Reports

- If reports are implemented (e.g., Invoice Report, Item Report), you can filter data based on date range or item categories.

<img src="./img/img 5.png" width="600" height="300"><br>

<img src="./img/img 6.png" width="600" height="300"><br>

<img src="./img/img 7.png" width="600" height="300"></br>


