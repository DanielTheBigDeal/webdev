НАЧАЛЬНЫЙ ФАЙЛ - index.html

Я создавал таблицу пользователей в базе данных через команду в phpMyAdmin:

CREATE DATABASE IF NOT EXISTS base;
USE base;

CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);


Для создания базы данных для новых саун используется следующий код:

CREATE TABLE saunas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type_of_steam_room VARCHAR(255) NOT NULL,
    capacity INT NOT NULL,
    swimming_pool VARCHAR(255) NOT NULL,
    rest_rooms INT NOT NULL,
    entertainments VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    photo_path VARCHAR(255) NOT NULL
);


Для создания базы данных телефонов используем следующий код:

CREATE TABLE phone_numbers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    phone_number VARCHAR(12) NOT NULL,
    time_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
