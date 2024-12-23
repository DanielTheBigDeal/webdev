<?php

function addSauna($name, $type_of_steam_room, $capacity, $swimming_pool, $rest_rooms, $entertainments, $price, $photoPath) {
    global $conn;

    // Подготовка данных перед добавлением в базу данных (защита от SQL-инъекций)
    $name = mysqli_real_escape_string($conn, $name);
    $type_of_steam_room = mysqli_real_escape_string($conn, $type_of_steam_room);
    $swimming_pool = mysqli_real_escape_string($conn, $swimming_pool);
    $entertainments = mysqli_real_escape_string($conn, $entertainments);

    // SQL-запрос для добавления сауны
    $sql = "INSERT INTO saunas (name, type_of_steam_room, capacity, swimming_pool, rest_rooms, entertainments, price, photo_path) 
            VALUES ('$name', '$type_of_steam_room', $capacity, '$swimming_pool', $rest_rooms, '$entertainments', $price, '$photoPath')";

    // Выполнение запроса
    if ($conn->query($sql) === TRUE) {
        // Успешно добавлено
        $conn->close();
        // Переход на страницу saunas.php
        if (file_exists("saunas.php")) {
            header("Location: saunas.php");
            exit();
        } else {
            echo "Error: saunas.php not found!";
        }
    } else {
        // В случае ошибки выводим сообщение
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
