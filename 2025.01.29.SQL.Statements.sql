-- creating and using the database
CREATE DATABASE abcindia;
USE abcindia;

-- creating the departments table
CREATE TABLE departments (
DeptID char(4) PRIMARY KEY,
DeptName varchar(50) not null unique
);

-- creating designations table
CREATE TABLE designations(
DesigID char(5) PRIMARY KEY,
DesigName varchar(50) NOT NULL unique
);

-- creating employees table
CREATE TABLE employees(
EmpID char(4) PRIMARY KEY,
Name varchar(100) NOT NULL,
Email varchar(50) NOT NULL UNIQUE,
Mobile char(10) NOT NULL UNIQUE,
DeptID char(4) NOT NULL,
DesigID char(5) NOT NULL,
Basic float NOT NULL,
foreign key (DeptID) REFERENCES departments(DeptID),
foreign key (DesigID) references designations(DesigID)
);

-- View structure of the table
DESC departments;
DESC designations;
DESC employees;


-- Inserting records in departments table
INSERT INTO departments VALUES ('D001','Information Technology');
INSERT INTO departments VALUES ('D002','Human Resource');
INSERT INTO departments VALUES ('D003','Production');

-- View all records in departments table
SELECT * FROM departments ORDER BY DeptID;

-- Inserting records in designations table
INSERT INTO designations VALUES('DG001', 'Support Engineering');
INSERT INTO designations VALUES('DG002', 'Human Resource Executive');

-- View all records in designations table
SELECT * FROM designations ORDER BY desigid;

-- Inserting records in employees table
INSERT INTO employees VALUES('E001','Amit Kumar','amit@yahoo.com','9988776655','D001','DG001',24000);
INSERT INTO employees VALUES('E002','Vikas Kumar','vikas@yahoo.com','8877665544','D001','DG001',34000);
INSERT INTO employees VALUES('E003','Rohit Kumar','rohit@yahoo.com','7766554433','D002','DG002',34000);

-- View all records with all columns
SELECT * FROM employees;

-- View all records with specific columns
SELECT empid, name, basic FROM employees;

-- View the record of employee having employee id as E002
SELECT * FROM employees WHERE empid='E002';

-- View the record of employee other than employee id as E002
-- Solution 1
SELECT * FROM employees WHERE empid<>'E002';
-- Solution 2
SELECT * FROM employees WHERE NOT empid='E002';
-- Solution 3
SELECT * FROM employees WHERE empid!='E002';

-- View the records of employees having their salary from 10000 to 25000
-- Solution 1
SELECT * FROM employees WHERE basic>=10000 AND basic<=25000;
-- Solution 2
SELECT * FROM employees WHERE basic BETWEEN 10000 AND 25000;

-- Creating and using virtual columns
-- Create a query to show the DA as 95% of basic, HRA as 65% of Basic and PF as 12% of basic.
SELECT empid as 'Employee ID', name as 'Employee Name', basic, 0.95*basic as 'DA', 0.65*basic as 'HRA', 0.12*basic as 'PF' FROM employees;

-- Show the department name and designation names rather than their codes
-- Solution 1
SELECT e.empid, e.name, e.basic, d.deptname, dg.designame 
FROM employees e, departments d, designations dg
WHERE e.deptid=d.deptid AND e.desigid=dg.desigid;

-- Solution 2
SELECT e.empid, e.name, e.basic, d.deptname, dg.designame 
FROM employees e
JOIN departments d ON e.deptid=d.deptid
JOIN designations dg ON e.desigid=dg.desigid;
