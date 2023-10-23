DROP DATABASE IF  EXISTS FruitShopDB;
CREATE DATABASE FruitShopDB;
USE FruitShopDB;

CREATE TABLE Address(
    postalCode INT NOT NULL PRIMARY KEY,
    city VARCHAR(50),
    street VARCHAR(150),
    country VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE `User`(
    userID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    postalCode INT,
    FOREIGN KEY (postalCode) REFERENCES Address (postalCode),
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    passwords VARCHAR(50),
    email VARCHAR(100),
    admin BIT
)ENGINE=InnoDB;

CREATE TABLE Category(
    categoryID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    categoryName VARCHAR(50),
    description TEXT
)ENGINE=InnoDB;

CREATE TABLE Product(
    productID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    categoryID INT,
    FOREIGN KEY (categoryID)  REFERENCES Category (categoryID),
    productName VARCHAR(150) NOT NULL,
    brand VARCHAR(50),
    stockQuantity INT,
    price FLOAT,
    description TEXT
)ENGINE=InnoDB;