CREATE TABLE admins (
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    admin_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(60) NOT NULL,
    pass CHAR(40) NOT NULL,
    reg_date DATETIME NOT NULL,
    PRIMARY KEY (admin_ID),
    UNIQUE (email)
);