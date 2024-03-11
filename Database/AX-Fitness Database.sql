

-- Create database ax_fitness;
DROP TABLE customer;
Create Table `customer` (
	Customer_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Branch_ID int(11) NOT NULL,
    Customer_name varchar(100) NOT NULL,
    Customer_email varchar(100) NOT NULL,
    Customer_no varchar(100) NOT NULL,
	Customer_gender varchar(20) NOT NULL,
    Customer_plan varchar(100) NOT NULL,
	Date_due DATE NOT NULL,
    isPaid varchar(100) NOT NULL,
    password varchar(100) NOT NULL
);
-- TRUNCATE customer;
INSERT INTO `customer` VALUES 
(1, '1', 'Allen Cabansag', 'allen@gmail.com', '638182005173', 'Male', 'Monthly', '2024-03-01','Paid', 'password'), 
(2, '2', 'Ian Breganza', 'ian@gmail.com', '630887653200', 'Other', 'Trimonthly', '2024-04-02','Paid', 'password'), 
(3, '2', 'Dave Badillio', 'badillio@gmail.com', '09082800264', 'female', 'Yearly', '2024-03-19','Unpaid', 'password');

Create Table `admins` (
	admin_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    admin_name varchar(100) NOT NULL,
    password varchar(100) NOT NULL
);
drop table coach;
Create Table `coach` (
	Coach_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Coach_name varchar(100) NOT NULL,
    Branch_ID int(11) NOT NULL,
    Coach_email varchar(100) NOT NULL,
    Coach_no varchar(100) NOT NULL,
    Coach_gender varchar(20) NOT NULL,
    present varchar(100) NOT NULL,
    password varchar(100) NOT NULL
);
INSERT INTO `coach` VALUES
(2, 'Brian De Jesus',1,'dejesus@gmail.com','090000000000','male','absent','password');

Create Table `membership` (
	Plan_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Plan_name varchar(100) NOT NULL,
    discount varchar(100) NOT NULL,
    Plan_price decimal(10,2) NOT NULL
);

DROP TABLE transactions;
Create Table `transactions` (
	transaction_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    referenceNo int(20) NOT NULL,
    receipt varchar(225) NOT NULL,
    identification varchar(255) NOT NULL,
    `Payment` decimal(10,2) NOT NULL,
    `Date` DATE NOT NULL,
    phone_no varchar(100) NOT NULL,
    Customer_ID varchar(100) NOT NULL
);
INSERT INTO transactions VALUES 
(2,'111','gcash_payment.jpg','sample.jpg',200,'2024-3-1',09000000000,2);

Create Table `branch` (
	Branch_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Branch_location varchar(100) NOT NULL,
    Branch_address varchar(100) NOT NULL,
    Branch_no varchar(100) NOT NULL
);

INSERT INTO branch VALUES 
(3,'Sta. Cruz, Wah','address blk lot','63000000000'),
(4,'San Pedro City Landayan','address blk lot','63000000000'),
(5,'Binan, Olivarez','address blk lot','63000000000');

INSERT INTO `admins` (`admin_ID`, `admin_name`, `password`) VALUES
(1, 'admin','password');