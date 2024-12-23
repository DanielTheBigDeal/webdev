НАЧАЛЬНЫЙ ФАЙЛ - index.html

Я создавал таблицу в базе данных через команду в phpMyAdmin:

CREATE DATABASE IF NOT EXISTS base;
USE base;

CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);
