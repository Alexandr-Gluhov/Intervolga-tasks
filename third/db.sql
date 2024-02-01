create database if not exists task;

create table if not exists
comments (id int primary key auto_increment, comment varchar(255));

create user if not exists php identified by '1234';

grant select, insert on task.comments to php;
