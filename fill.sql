-- CSCI 466
-- Inserting all items
-- Michael Marchetti

--1
INSERT INTO Product VALUES (
    '12347890',
    '299.99',
    'Tablet, Silver, 64gb',
    '100',
    '200'
); 

--2
INSERT INTO Product VALUES (
    '87349271',
    '349.99',
    'Tablet, Silver, 128gb',
    '50',
    '240'
);

--3
INSERT INTO Product VALUES (
    '47382332',
    '299.99',
    'Tablet, Gold, 64gb',
    '400',
    '2000'
);

--4
INSERT INTO Product VALUES (
    '12345687',
    '349.99',
    'Tablet, Gold, 128gb',
    '50',
    '300'
);

--5
INSERT INTO Product VALUES (
    '13447890',
    '399.99',
    'Tablet Pro, Silver, 128gb',
    '40',
    '200'
);

--6
INSERT INTO Product VALUES (
    '12309238',
    '449.99',
    'Tablet Pro, Silver, 256gb',
    '150',
    '280'
);

--7
INSERT INTO Product VALUES (
    '12398340',
    '599.99',
    'Tablet Pro, Silver, 512gb',
    '100',
    '2000'
);

--8
INSERT INTO Product VALUES (
    '06958473',
    '399.99',
    'Tablet Pro, Space Gray, 128gb',
    '1000',
    '2000'
);

--9
INSERT INTO Product VALUES (
    '14958473',
    '449.99',
    'Tablet Pro, Space Gray, 256gb',
    '400',
    '2040'
);

--10
INSERT INTO Product VALUES (
    '12309820',
    '499.99',
    'Tablet Pro, Space Gray, 512gb',
    '150',
    '2000'
);

--11
INSERT INTO Product VALUES (
    '23409890',
    '599.99',
    'Ultrabook, 128gb',
    '300',
    '2300'
);

--12
INSERT INTO Product VALUES (
    '12234989',
    '659.99',
    'Ultrabook, 256gb',
    '130',
    '200'
);

--13
INSERT INTO Product VALUES (
    '12323467',
    '699.99',
    'Ultrabook, 512gb',
    '150',
    '290'
);

--14
INSERT INTO Product VALUES (
    '53677993',
    '899.99',
    'Gaming Laptop, 256gb',
    '90',
    '300'
);

--15
INSERT INTO Product VALUES (
    '35784486',
    '949.99',
    'Gaming Laptop, 512gb',
    '80',
    '200'
);

--16
INSERT INTO Product VALUES (
    '96385271',
    '999.99',
    'Gaming Laptop, 1tb',
    '30',
    '90'
);

--17
INSERT INTO Product VALUES (
    '17056384',
    '899.99',
    'SmartPhone, 64gb',
    '00',
    '200'
);

--18
INSERT INTO Product VALUES (
    '58943981',
    '949.99',
    'SmartPhone, 128gb',
    '100',
    '200'
);

--19
INSERT INTO Product VALUES (
    '56622856',
    '999.99',
    'SmartPhone, 256gb',
    '100',
    '200'
);

--20
INSERT INTO Product VALUES (
    '75732848',
    '4.99',
    'Banana sticker, 20pk',
    '100',
    '200'
);

-- fill all customers

--1
INSERT INTO Customer VALUES (
    'bunnyhopper802@gmail.com',
    'Jack Black',
    'Password321',
    '1234567812345678',
    '123',
    '01/26',
    '12345',
    '123 street lane',
    'Metropolis',
    'Illinois'
);

--2
INSERT INTO Customer VALUES (
    'patronsaint@gmail.com',
    'Johnny Virtues',
    'Wordpass098',
    '0987654309876543',
    '098',
    '12/25',
    '09876',
    '098 lane street',
    'Gotham',
    'New York'
);

--3
INSERT INTO Customer VALUES (
    'soccerdad78@gmail.com',
    'Ben Jammin',
    'CoolGuy123',
    '6574839201657483',
    '657',
    '07/25',
    '65748',
    '657 apple lane',
    'Rockford',
    'Illinois'
);

--4
INSERT INTO Customer VALUES (
    'bobsaget@gmail.com',
    'Bob Saget',
    'Idkman999',
    '0099887766554433',
    '000',
    '09/25',
    '00998',
    '009 rue avenue',
    'Dekalb',
    'Illinois'
);

--5
INSERT INTO Customer VALUES (
    'vivalafrance@gmail.com',
    'Louise Dupont',
    'CakeToEat123',
    '7849584736104720',
    '847',
    '03/26',
    '11112',
    '476 jambon lane',
    'Paris',
    'Idaho'
);


-- fill shipment info


-- 1
INSERT INTO Shipment VALUES (
    '1234',
    '2022-05-15'
);

-- 2
INSERT INTO Shipment VALUES (
    '1235',
    '2022-05-16'
);

-- 3
INSERT INTO Shipment VALUES (
    '1236',
    '2022-05-15'
);

-- 4
INSERT INTO Shipment VALUES (
    '1237',
    '2022-05-14'
);

-- 5
INSERT INTO Shipment VALUES (
    '1238',
    '2022-05-15'
);


-- fill all orders


--1
INSERT INTO Order_ (Order_Num, Order_Date) VALUES (
    '12347890',
    '2022-05-05'
);

--2
INSERT INTO Order_ (Order_Num, Order_Date) VALUES (
    '95736855',
    '2022-05-05'
);

--3
INSERT INTO Order_ (Order_Num, Order_Date) VALUES (
    '84937502',
    '2022-05-05'
);

--4
INSERT INTO Order_ (Order_Num, Order_Date) VALUES (
    '23450324',
    '2022-05-05'
);

--5
INSERT INTO Order_ (Order_Num, Order_Date) VALUES (
    '82734574',
    '2022-05-05'
);


-- associate order num to email

--1
INSERT INTO Customer_Order VALUES (
    'bunnyhopper802@gmail.com',
    '12347890'
);

--2
INSERT INTO Customer_Order VALUES (
    'patronsaint@gmail.com',
    '95736855'
);

--3
INSERT INTO Customer_Order VALUES (
    'soccerdad78@gmail.com',
    '84937502'
);

--4
INSERT INTO Customer_Order VALUES (
    'bobsaget@gmail.com',
    '23450324'
);

--5
INSERT INTO Customer_Order VALUES (
    'vivalafrance@gmail.com',
    '82734574'
);


-- associate order and product tables


--1 order for bunnyhopper
INSERT INTO Order_Product VALUES (
    '12347890',
    '12323467',
    '1'
);

--1.1 order for bunnyhopper
INSERT INTO Order_Product VALUES (
    '12347890',
    '14958473',
    '2'
);

--2 order for patronsaint
INSERT INTO Order_Product VALUES (
    '95736855',
    '13447890',
    '3'
);

--3 order for soccerdad
INSERT INTO Order_Product VALUES (
    '84937502',
    '06958473',
    '2'
);

--4 order for bobsaget
INSERT INTO Order_Product VALUES (
    '23450324',
    '75732848',
    '40'
);

--4 order for bobsaget
INSERT INTO Order_Product VALUES (
    '23450324',
    '12309238',
    '1'
);

--5 order for vivalafrance
INSERT INTO Order_Product VALUES (
    '82734574',
    '75732848',
    '500'
);


-- associate order and shipment


--1 
INSERT INTO Order_Shipment VALUES (
    '12347890',
    '1234'
);

--2
INSERT INTO Order_Shipment VALUES (
    '95736855',
    '1235'
);

--3
INSERT INTO Order_Shipment VALUES (
    '84937502',
    '1236'
);

--4
INSERT INTO Order_Shipment VALUES (
    '23450324',
    '1237'
);

--5
INSERT INTO Order_Shipment VALUES (
    '82734574',
    '1238'
);


-- associate email and ship_id


-- 1
INSERT INTO Customer_Shipment VALUES (
    'bunnyhopper802@gmail.com',
    '1234'
);

-- 2
INSERT INTO Customer_Shipment VALUES (
    'patronsaint@gmail.com',
    '1235'
);

-- 3
INSERT INTO Customer_Shipment VALUES (
    'soccerdad78@gmail.com',
    '1236'
);

-- 4
INSERT INTO Customer_Shipment VALUES (
    'bobsaget@gmail.com',
    '1237'
);

-- 5
INSERT INTO Customer_Shipment VALUES (
    'vivalafrance@gmail.com',
    '1238'
);