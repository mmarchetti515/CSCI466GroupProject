-- Michael Marchetti
-- CSCI466
-- SQL script to create the db for CSCI466 group project

-- drop tables if any changes need to be made
DROP Customer;
DROP Product;
DROP Cart;
DROP Order;

CREATE TABLE Customer (
    email INT UNIQUE PRIMARY KEY, 
    addr VARCHAR(50),
    passwd VARCHAR(30) NOT NULL, 
    l_name VARCHAR(30) NOT NULL,
    f_name VARCHAR(30) NOT NULL
);

CREATE TABLE Product (
    p_id INT(10) UNIQUE PRIMARY KEY, 
    p_price FLOAT NOT NULL,
    p_name VARCHAR(30) NOT NULL, 
    qty_avail INT NOT NULL
);

CREATE TABLE Cart(
    cart_id INT(9) UNIQUE PRIMARY KEY,
    p_id INT(10) UNIQUE FOREIGN KEY,
    p_price_sum FLOAT NOT NULL,
    qty INT NOT NULL
);


CREATE TABLE Order )

);
