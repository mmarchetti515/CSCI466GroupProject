DROP TABLE empLogin;

-- Create Entity Tables
CREATE TABLE empLogin(
    empID           INT             UNIQUE      PRIMARY KEY     AUTO_INCREMENT,
    empUser         VARCHAR(50)     NOT NULL,
    password        VARCHAR(50)     NOT NULL
);

INSERT INTO empLogin VALUES(
    '7986', 'bigpapa', 'Password123'
);