-- CSCI 466

-- Drop Tables
DROP TABLE Customer_Order;
DROP TABLE Order_Product;

DROP TABLE Customer;
DROP TABLE Order_;
DROP TABLE Product;
DROP TABLE Shipment;

-- Create Entity Tables
CREATE TABLE Customer(
    Email           VARCHAR(30)     UNIQUE  PRIMARY KEY,
    Name            VARCHAR(50)     NOT NULL,
    Password        VARCHAR(20)     NOT NULL,
    CC_Num          CHAR(16)        NOT NULL,
    CVV             CHAR(4)         NOT NULL,
    CC_Exp_Date     CHAR(5)         NOT NULL,
    ZIP             CHAR(5)         NOT NULL,
    Street_Address  VARCHAR(50)     NOT NULL,
    City            VARCHAR(50)     NOT NULL,
    State           VARCHAR(50)     NOT NULL
);

CREATE TABLE Order_(
    Order_Num       INT             UNIQUE  PRIMARY KEY,
    Requested_QTY   INT             NOT NULL,
    Order_Date      DATE            NOT NULL,
    Status          VARCHAR(16)     NOT NULL,
    Net_Total       INT             NOT NULL
);
       
CREATE TABLE Product(
    P_ID            INT             UNIQUE  PRIMARY KEY,
    P_Price         INT             NOT NULL,
    P_Name          VARCHAR(20)     NOT NULL,
    QTY_Avail       INT             NOT NULL,
    Lifetime_QTY    INT             NOT NULL
);

CREATE TABLE Shipment(
    Ship_ID         INT             UNIQUE  PRIMARY KEY,
    Delivery_Date   DATE            NOT NULL,
    Num_Packages    INT             NOT NULL,
    Package_Type    VARCHAR(20)     NOT NULL
);

-- Create Relationship Tables
CREATE TABLE Customer_Order(
    Email           VARCHAR(30),
    Order_Num       INT             UNIQUE,

    FOREIGN KEY (Email)     REFERENCES Customer (Email),
    FOREIGN KEY (Order_Num) REFERENCES Order_   (Order_Num)
);

CREATE TABLE Order_Product(
    Order_Num       INT         
);
