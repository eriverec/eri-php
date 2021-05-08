create database dblab;
use dblab;

CREATE TABLE login (
id int(9) NOT NULL auto_increment,
name varchar(100) NOT NULL,
email varchar(100) NOT NULL,
username varchar(100) NOT NULL,
password varchar(100) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE products (
id int(11) NOT NULL auto_increment,
codigo varchar(100) NOT NULL,
resumen varchar(100) NOT NULL,
precio decimal(10,2) NOT NULL,
login_id int(11) NOT NULL,
PRIMARY KEY (id),
CONSTRAINT FK_products_1
FOREIGN KEY (login_id) REFERENCES login(id)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;


-- LOGIN
-- USER:admin
-- CLAVE:1234

INSERT INTO login(name, email, username, PASSWORD) 
VALUES('AdminLab', 'admin@gmail.com', 'admin', MD5('1234'))