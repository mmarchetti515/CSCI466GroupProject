-- CSCI 466

-- Drop Tables

-- Create Entity Tables
CREATE TABLE Customer(
    Email           VARCHAR(30)     PRIMARY KEY,
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
    Order_Num       INT         PRIMARY KEY,
    Requested_QTY   INT         NOT NULL,
    Order_Date      DATE        NOT NULL,
    Status          VARCHAR(16) NOT NULL,
    Net_Total       INT         NOT NULL
);
       
CREATE TABLE Product(
    P_ID            INT             PRIMARY KEY,
    P_Price         INT             NOT NULL,
    P_Name          VARCHAR(20)     NOT NULL,
    QTY_Avail       INT             NOT NULL,
    Lifetime_QTY    INT             NOT NULL
);

CREATE TABLE Shipment(
    Ship_ID         INT         PRIMARY KEY,
    Delivery_Date   DATE        NOT NULL,
    Num_Packages    INT         NOT NULL,
    Package_Type    VARCHAR(20) NOT NULL
);

-- Create Relationship Tables
