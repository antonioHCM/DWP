DROP DATABASE IF  EXISTS FruitShopDB;
CREATE DATABASE FruitShopDB;
USE FruitShopDB;

CREATE TABLE Address (
    postalCode INT NOT NULL PRIMARY KEY,
    city VARCHAR(50),
    street VARCHAR(150),
    country VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE User (
    userID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    postalCode INT,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    passwords VARCHAR(50),
    email VARCHAR(100),
    admin BIT,
    FOREIGN KEY (postalCode) REFERENCES Address(postalCode)
) ENGINE=InnoDB;

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

CREATE TABLE `Order`(
    orderID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    orderAmount INT,
    currentStatus VARCHAR(50),
    orderDate DATE
)ENGINE=InnoDB;

CREATE TABLE Payment(
    paymentID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    orderID INT,
    FOREIGN KEY (orderID) REFERENCES `Order` (orderID),
    paymentsType VARCHAR(50),
    paymentDate DATE
)ENGINE=InnoDB;

CREATE TABLE OrderItem(
    orderItemID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    orderID INT,
    FOREIGN KEY (orderID) REFERENCES `Order` (orderID),
    userID INT,
    FOREIGN KEY (userID) REFERENCES `User` (userID),
    productID INT,
    FOREIGN KEY (productID) REFERENCES Product (productID),
    price FLOAT NOT NULL,
    quantity INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Review(
    reviewID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    productID INT,
    FOREIGN KEY (productID) REFERENCES Product (productID),
    userID INT,
    FOREIGN KEY (userID) REFERENCES User (userID),
    rating INT,
    reviewDate Date NOT NULL,
    reviewContent TEXT NOT NULL
)ENGINE=InnoDB;

insert into Address (postalCode, city, street, country) values ('3007', 'Bahay Pare', 'Carberry', 'Philippines');
insert into Address (postalCode, city, street, country) values ('08-420', 'Miastków Kościelny', 'Sullivan', 'Poland');
insert into Address (postalCode, city, street, country) values ('311-4317', 'Ashibetsu', 'Harbort', 'Japan');
insert into Address (postalCode, city, street, country) values ('23501', 'Uusikaupunki', 'Everett', 'Finland');
insert into Address (postalCode, city, street, country) values ('904-2244', 'Okinawa', 'Pine View', 'Japan');


insert into User (postalCode, firstName, lastName, passwords, email, admin) values ('08-420', 'Sandie', 'Oleksiak', 'oR5,w''m\tvg', 'soleksiak0@123-reg.co.uk', false);
insert into User (postalCode, firstName, lastName, passwords, email, admin) values ('311-4317', 'Kanya', 'Wicken', 'fR4/ixw,%5', 'kwicken1@oaic.gov.au', false);
insert into User (postalCode, firstName, lastName, passwords, email, admin) values ('3007', 'Roth', 'Jutson', 'zI5!p*_Px%d6%', 'rjutson2@gmpg.org', false);
insert into User (postalCode, firstName, lastName, passwords, email, admin) values ('23501', 'Salmon', 'Gunderson', 'jW2)O`#G5D!_8', 'sgunderson4@wordpress.org', false);
insert into User (postalCode, firstName, lastName, passwords, email, admin) values ('904-2244', 'Leroi', 'Keary', 'yG5?|PujUxk.', 'lkeary8@studiopress.com', false);

insert into Category (categoryName, description) values ('Berries', 'A berry is a small, pulpy, and often edible fruit. Typically, berries are juicy, rounded, brightly colored, sweet, sour or tart, and do not have a stone or pit, although many pips or seeds may be present');
insert into Category (categoryName, description) values ('Pits', 'Stone fruits, also known as drupes, have thin skins that can be fuzzy or smooth. They are called so as their seeds are enclosed by large and hard pits (endocarps). The pits hence are at the center of their juicy and soft flesh. Examples of stone fruits – Peaches, Apricots, Mangoes, Plums, Cherries, etc.');
insert into Category (categoryName, description) values ('Citrus fruits', 'Plants in the genus produce citrus fruits, including important crops such as oranges, lemons, grapefruits, pomelos, and limes.');
insert into Category (categoryName, description) values ('Melons', 'A melon is any of various plants of the family Cucurbitaceae with sweet, edible, and fleshy fruit.');
insert into Category (categoryName, description) values ('Tropical fruit', ' Fruits that typically grow in warm tropical climates or equatorial areas.');
insert into Category (categoryName, description) values ('Cores', 'Fruits with a huge seed inside');

insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (1, 'Grapes', 'Oxaprozin', 44, 48, 'GREEN GRAPES FROM SOMEWHERE');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (2, 'Pear', 'Famotidine', 17, 35, 'Green preas from somewhere else');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (3, 'Grapefruit', 'MARK', 88, 27, 'Sour grapefruits');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (4, 'Pixie melon', 'PREP', 40, 92, 'The swetest melons I have tasted');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (1, 'Gooseberry', 'Carbidopa', 44, 34, 'I dont even know what a goseberry is');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (5, 'Coconut', 'HyQvia', 98, 59, 'No discription needed');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (6, 'Apple', 'Orajel ', 84, 97, 'Apples are nice');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (1, 'Blueberry', 'TENDERWRAP', 34, 88, 'Blue blueberrys');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (2, 'Peaches', 'DIORSNOW ', 59, 9, 'Peaches from Portugal');
insert into Product (categoryID, productName, brand, stockQuantity, price, description) values (3, 'Lemons', 'Tussin ', 57, 80, 'The yellow limes');
