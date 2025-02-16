CREATE DATABASE ecart;
use   ecart;
CREATE TABLE Products (
    pcode INT PRIMARY KEY,
    pname VARCHAR(50) NOT NULL UNIQUE,
    quantity INT NOT NULL,
    unitprice FLOAT NOT NULL,
    productadddate DATE NOT NULL,
    lastpurchasedate DATE,
    lastsaledate DATE
);
CREATE TABLE Transaction (
    tcode INT PRIMARY KEY AUTO_INCREMENT,
    tdate DATE NOT NULL,
    pcode INT NOT NULL,
    quantity INT NOT NULL,
    unitprice FLOAT NOT NULL,
    ttype CHAR(1) NOT NULL,  -- S for Sale, P for Purchase
    FOREIGN KEY (pcode) REFERENCES Products(pcode)
);
INSERT INTO Products (pcode, pname, quantity, unitprice, productadddate) 
VALUES 
(101, 'Samsung TV', 9, 23000, '2023-09-23'),
(102, 'LG Mobile', 12, 12400, '2023-12-10'),
(103, 'Washing Machine', 15, 17900, '2024-01-12');

INSERT INTO Transaction (tdate, pcode, quantity, unitprice, ttype)
VALUES 
('2024-01-15', 101, 3, 24500, 'S'),
('2024-01-16', 102, 5, 14500, 'S'),
('2025-01-17', 101, 2, 23400, 'P'),
('2025-01-18', 102, 3, 13100, 'P');

-- Update Products table for last sale and purchase date, and quantity
UPDATE Products 
SET quantity = quantity - 3, lastsaledate = '2024-01-15'
WHERE pcode = 101;

UPDATE Products 
SET quantity = quantity - 5, lastsaledate = '2024-01-16'
WHERE pcode = 102;

UPDATE Products 
SET quantity = quantity + 2, lastpurchasedate = '2025-01-17', unitprice = 23400
WHERE pcode = 101;

UPDATE Products 
SET quantity = quantity + 3, lastpurchasedate = '2025-01-18', unitprice = 13100
WHERE pcode = 102;

-- Show all records in Products table
SELECT * FROM Products;

-- Show all records in Transaction table
SELECT * FROM Transaction;

-- Total sale and purchase by product name
SELECT 
    p.pname, 
    SUM(CASE WHEN t.ttype = 'S' THEN t.quantity * t.unitprice ELSE 0 END) AS total_sale,
    SUM(CASE WHEN t.ttype = 'P' THEN t.quantity * t.unitprice ELSE 0 END) AS total_purchase
FROM 
    Products p
JOIN 
    Transaction t ON p.pcode = t.pcode
GROUP BY 
    p.pname;

