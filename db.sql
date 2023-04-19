create database oop;
create table users(
                      id int(11) not null auto_increment,
                      name varchar(255) not null,
                      email varchar(255) not null,
                      password varchar(255) not null,
                      primary key(id)
);
INSERT INTO users (name,email,password) VALUES ('Jorabe','kemail','apassword');
UPDATE users SET name = 'Jorabek', email = 'j.a.y', password = 'asdasd' ,age = '12' WHERE id = 1;
create table companies(
                          id int(11) not null auto_increment,
                          name varchar(255) not null,
                          primary key(id)
);
alter table users
    add column photo varchar(255) null ;