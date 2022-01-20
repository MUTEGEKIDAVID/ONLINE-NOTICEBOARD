CREATE TABLE shop (
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_name VARCHAR(20) NOT NULL,
    item_img VARCHAR(20) ,
    item_cost INT NOT NULL,
    item_status VARCHAR(45) NOT NULL,
    item_quantity INT NOT NULL,
    PRIMARY KEY(item_id)
);
