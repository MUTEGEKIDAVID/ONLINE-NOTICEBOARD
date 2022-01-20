CREATE TABLE orders(
    order_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    total INT NOT NULL,
    order_date DATETIME NOT NULL,
    PRIMARY KEY (order_id)
);