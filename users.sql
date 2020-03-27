CREATE DATABASE basic_login;


CREATE TABLE t_Users(id int AUTO_INCREMENT PRIMARY KEY,
                     Name VARCHAR (100) NOT NULL,
                     username VARCHAR(100) NOT NULL,
                     password VARCHAR(100) NOT NULL );

INSERT INTO t_Users (Name,username,password) VALUES('Allan Musembya','admin','admin');