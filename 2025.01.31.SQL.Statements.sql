-- Creating a database
CREATE DATABASE mylibrary;

-- Selecting a database as current working database
USE mylibrary;

-- Creating table
CREATE TABLE book(
bookno INT,
title VARCHAR(50),
author VARCHAR(50)
);

-- View structure of the table
DESC book;

-- Alter table by adding new column
ALTER TABLE book
ADD Column price float;

ALTER TABLE book
ADD Column isbn varchar(15);

-- View structure of the table
DESC book;

-- Alter table by adding changing size of a column
ALTER TABLE book
MODIFY Column title VARCHAR(100);

-- View structure of the table
DESC book;

-- Alter table by dropping a column
ALTER TABLE book
DROP COLUMN isbn;

-- View structure of the table
DESC book;

-- Inserting multiple records
INSERT INTO book VALUES
(101,'C Programming','Amit Kumar',600),
(102,'C++ Programming','Nitin Kumar Sharma',200),
(103,'Java Programming','Kumar Verma',500),
(104,'PHP Programming','Harish Gupta',900),
(105,'SQL Programming','Amit Verma',1200);

INSERT INTO book(bookno,title,author) VALUES
(106,'Learning Python','Lokesh Kumar');



-- View all records with all columns
SELECT * FROM book;

-- View limited records with all columns
SELECT * FROM book LIMIT 3;

-- View limited records with all columns after specific offset
SELECT * FROM book LIMIT 3 OFFSET 2;

-- View all records with selected columns
SELECT bookno,title FROM book;

-- Relational Operators 	=	<> or !=	>	>=	<	<=	BETWEEN x AND y IN 	LIKE IS NULL
-- Logical AND OR NOT

-- View selected records with all columns
SELECT * FROM book WHERE bookno=102;
SELECT * FROM book WHERE bookno<>102;

SELECT * FROM book WHERE price>=200 and price<=900;
SELECT * FROM book WHERE price BETWEEN 200 AND 900;

SELECT * FROM book WHERE price=200 or price=500;
SELECT * FROM book WHERE price in (200,500);

-- LIKE operator is used to build the patterns using wild card characters % and underscore (_)
-- % means any number of characater and _ means one character
-- Show all those books where author names starts with Kumar
SELECT * FROM book WHERE author LIKE 'Kumar%'; 
-- Show all those books where author names ends with Kumar
SELECT * FROM book WHERE author LIKE '%Kumar';
-- Show all those books where author names contains Kumar
SELECT * FROM book WHERE author LIKE '%Kumar%';

-- Show those books where 3rd character of author name is t
SELECT * FROM book WHERE author LIKE '__t%';

-- show those books where price is not provided
SELECT * FROM book WHERE price IS NULL;

-- Sorting Data
SELECT * FROM book ORDER BY author;
SELECT * FROM book ORDER BY author DESC;

-- Using aggregate functions
-- Show the price of all books in the library, average price, minimum price and max price
SELECT sum(price), avg(price), min(price), max(price) FROM book;
-- Show the count of total books in the library
SELECT COUNT(*) FROM book;

-- Query within the query
-- Show all books where price of the book is above the average price
SELECT bookno, title,price 
FROM book
WHERE price >= (SELECT avg(price) FROM book);

-- Create sub table from a table
CREATE TABLE titlewise AS
SELECT * FROM book 
WHERE bookno>=104
ORDER by title;
SELECT * FROM titlewise;

-- Create virtual table from a table
CREATE VIEW pricewise AS
SELECT * FROM book 
WHERE bookno<=104
ORDER by price;
SELECT * FROM pricewise;

-- updating records
UPDATE book SET price=450 WHERE bookno=106;
SELECT * FROM book;

-- Delete records
DELETE FROM book WHERE bookno=106;
SELECT * FROM book;

-- Removing all records but keep the structure of the table
TRUNCATE TABLE book;
SELECT * FROM book;

-- Remove the table
DROP TABLE book;
SELECT * FROM book;

-- Remove the whole database including tables and records
DROP DATABASE mylibrary;
