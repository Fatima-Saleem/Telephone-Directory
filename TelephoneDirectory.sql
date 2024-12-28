CREATE DATABASE IF NOT EXISTS `TelephoneDirectory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `TelephoneDirectory`;

create table users(
    user_id int auto_increment primary key,
    username varchar(50) not null,
    password varchar(50) not null
);



create table directory(
    id int auto_increment primary key,
    user_id int not null,
    name varchar(50) not null,
    phone varchar(50) not null,
    email varchar(50) not null,
    foreign key(user_id) references users(user_id)
);

insert into users(username,password)values('Fatima','fast1234');



insert into directory(user_id,name,phone,email)values(1,'Fatima Saleem','0325-8974200','fatima@gmail.com');