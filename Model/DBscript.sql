DROP DATABASE IF  EXISTS FruitShopDB;
CREATE DATABASE FruitShopDB;
USE FruitShopDB;

CREATE TABLE User (
    userID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    passwords VARCHAR(150),
    email VARCHAR(100),
    city VARCHAR(50),
    street VARCHAR(150),
    country VARCHAR(50),
    admin TINYINT(1)
) ENGINE=InnoDB;

CREATE TABLE Category(
    categoryID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    categoryName VARCHAR(50),
    description TEXT,
    featuredCategory TINYINT (1)
)ENGINE=InnoDB;

CREATE TABLE Product(
    productID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    categoryID INT,
    FOREIGN KEY (categoryID)  REFERENCES Category (categoryID),
    productName VARCHAR(150) NOT NULL,
    brand VARCHAR(50),
    stockQuantity INT,
    price Decimal,
    description TEXT,
    img VARCHAR(200)
)ENGINE=InnoDB;

CREATE TABLE ShoppingCart (
    cartID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID INT,
    FOREIGN KEY (userID) REFERENCES User (userID)
) ENGINE=InnoDB;

CREATE TABLE Invoice(
    invoiceID INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
    cartID   INT,
    FOREIGN KEY (cartID) REFERENCES `ShoppingCart` (cartID),
    invoiceDate DATE
)ENGINE=InnoDB;

CREATE TABLE CartItem (
    cartItemID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cartID INT,
    FOREIGN KEY (cartID) REFERENCES ShoppingCart (cartID),
    productID INT,
    FOREIGN KEY (productID) REFERENCES Product (productID),
    quantity INT NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Information(
    infoID VARCHAR(100) NOT NULL  PRIMARY KEY,
    content VARCHAR(1000)
)ENGINE=InnoDB;




insert into User ( firstName, lastName, passwords, email, admin) values ('Sandie', 'Oleksiak', 'oR5,w''m\tvg', 'soleksiak0@123-reg.co.uk', false);
insert into User ( firstName, lastName, passwords, email, admin) values ('Kanya', 'Wicken', 'fR4/ixw,%5', 'kwicken1@oaic.gov.au', false);
insert into User ( firstName, lastName, passwords, email, admin) values ('Roth', 'Jutson', 'zI5!p*_Px%d6%', 'rjutson2@gmpg.org', false);
insert into User ( firstName, lastName, passwords, email, admin) values ('Salmon', 'Gunderson', 'jW2)O`#G5D!_8', 'sgunderson4@wordpress.org', false);
insert into User ( firstName, lastName, passwords, email, admin) values ('Leroi', 'Keary', 'yG5?|PujUxk.', 'lkeary8@studiopress.com', false);

insert into Category (categoryName, description) values ('Berries', 'A berry is a small, pulpy, and often edible fruit. Typically, berries are juicy, rounded, brightly colored, sweet, sour or tart, and do not have a stone or pit, although many pips or seeds may be present');
insert into Category (categoryName, description) values ('Pits', 'Stone fruits, also known as drupes, have thin skins that can be fuzzy or smooth. They are called so as their seeds are enclosed by large and hard pits (endocarps). The pits hence are at the center of their juicy and soft flesh. Examples of stone fruits – Peaches, Apricots, Mangoes, Plums, Cherries, etc.');
insert into Category (categoryName, description) values ('Citrus fruits', 'Plants in the genus produce citrus fruits, including important crops such as oranges, lemons, grapefruits, pomelos, and limes.');
insert into Category (categoryName, description) values ('Melons', 'A melon is any of various plants of the family Cucurbitaceae with sweet, edible, and fleshy fruit.');
insert into Category (categoryName, description) values ('Tropical fruit', ' Fruits that typically grow in warm tropical climates or equatorial areas.');
insert into Category (categoryName, description) values ('Cores', 'Fruits with a huge seed inside');

insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (1, 'Grapes', 'Oxaprozin', 44, 48, 'GREEN GRAPES FROM SOMEWHERE','/View/Images/Grapes.webp');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (2, 'Pear', 'Famotidine', 17, 35, 'Green preas from somewhere else', '/View/Images/Pear.jpg');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (3, 'Grapefruit', 'MARK', 88, 27, 'Sour grapefruits', '/View/Images/Grapefruit.jpg');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (4, 'Pixie melon', 'PREP', 40, 92, 'The swetest melons I have tasted', '/View/Images/Pixie melon.webp');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (1, 'Gooseberry', 'Carbidopa', 44, 34, 'I dont even know what a goseberry is', '/View/Images/Gooseberry.jpg');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (5, 'Coconut', 'HyQvia', 98, 59, 'No discription needed', '/View/Images/Coconut.jpg');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (6, 'Apple', 'Orajel ', 84, 97, 'Apples are nice', '/View/Images/Apple.webp');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (1, 'Blueberry', 'TENDERWRAP', 34, 88, 'Blue blueberrys', '/View/Images/Blueberry.jpg');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (2, 'Peaches', 'DIORSNOW ', 59, 9, 'Peaches from Portugal', '/View/Images/Peaches.jpg');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (3, 'Lemons', 'Tussin ', 57, 80, 'The yellow limes', '/View/Images/Lemons.webp');
insert into Product (categoryID, productName, brand, stockQuantity, price, description, img) values (3, 'Gomu-Gomu no mi', 'Akuma no mi ', 1, 5600000, 'Tastes like rubber', '/View/Images/Gomu-Gomunomi.jpg');

insert into Information(infoID, content) values ('CompanyDescription', 'Company description blablablabla');
insert into Information(infoID, content) values ('OpeningHours', 'Company description blablablabla');
insert into Information(infoID, content) values ('News', 'Company description blablablabla');
