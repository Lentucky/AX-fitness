

Create database ax_fitness;

DROP table `customer`;
Create Table `customer` (
	Customer_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Coach_ID int(11),
    Branch_ID int(11) NOT NULL,
    Customer_name varchar(100) NOT NULL,
    Customer_email varchar(100) NOT NULL,
    Customer_no varchar(100) NOT NULL,
	Customer_gender varchar(20) NOT NULL,
    Customer_plan varchar(100) NOT NULL,
	Date_due DATE NOT NULL,
    password varchar(100) NOT NULL
);

drop Table `admin`;

Create Table `admins` (
	admin_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    admin_name varchar(100) NOT NULL,
    password varchar(100) NOT NULL
);
drop table `coach`;
Create Table `coach` (
	Coach_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Coach_name varchar(100) NOT NULL,
    Branch_ID int(11) NOT NULL,
    Coach_email varchar(100) NOT NULL,
    Coach_no varchar(100) NOT NULL,
    Coach_gender varchar(20) NOT NULL,
    password varchar(100) NOT NULL
);

Create Table `membership` (
	Plan_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Plan_name varchar(100) NOT NULL,
    discount varchar(100) NOT NULL,
    Plan_price decimal(10,2) NOT NULL
);

Create Table `transaction` (
	transaction_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    transaction_name varchar(100) NOT NULL,
    transaction_price decimal(10,2) NOT NULL
);
Create Table `branch` (
	Branch_ID int(11) NOT NULL PRIMARY KEY auto_increment,
    Branch_location varchar(100) NOT NULL,
    Branch_address varchar(100) NOT NULL,
    Branch_no varchar(100) NOT NULL
);

INSERT INTO branch VALUES (3,'Sta. Cruz, Ewan','address blk lot','63000000000');
DROP TABLE users;
INSERT INTO `admins` (`admin_ID`, `admin_name`, `password`) VALUES
(1, 'admin','password');

INSERT INTO `customer` (`Customer_ID`, `Coach_ID`, `Branch_ID`, `Customer_name`, `Customer_email`, `Customer_no`, `Customer_plan`,`Date_due`, `password`) VALUES
(1, 2, 1, 'Allen Cabansag', 'allen@gmail.com', '638182005173', 'Simple', '2024-3-1','password'),
(2, 1, 2, 'Ian Breganza', 'ian@gmail.com', '630887653200', 'Assisted', '2024-4-2','password');

INSERT INTO `coach` (`Coach_ID`, `Coach_name`, `Branch_ID`, `Coach_email`, `Coach_no`, `password`) VALUES
(1, 'John Doe', 1, 'johndoe@gmail.com', '634546778012','password'),
(2, 'Jalyn Doe', 2, 'jalyndoe@gmail.com', '63005618012','password');

INSERT INTO `branch` (`Branch_ID`, `Branch_Location`, `Branch_no`, `Branch_email`) VALUES
(1, 'Sta. Cruz', '639146571012','AXfitnessStaCruz@gmail.com'),
(2, 'Los Banos', '631137972018','AXfitnessLosBanos@gmail.com');