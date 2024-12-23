<?php
session_start();
require_once('db.php');
require_once('add_sauna.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_sauna'])) {
    $name = $_POST['name'];
    $type_of_steam_room = $_POST['type_of_steam_room'];
    $capacity = $_POST['capacity'];
    $swimming_pool = $_POST['swimming_pool'];
    $rest_rooms = $_POST['rest_rooms'];
    $entertainments = $_POST['entertainments'];
    $price = $_POST['price'];

    // Обработайте загрузку файла (фотографии)
    $uploadDir = 'uploads/'; // Директория для загрузки файлов
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        // Файл успешно загружен
        $photoPath = $uploadFile;
    } else {
        // Ошибка загрузки файла
        $photoPath = ''; // или другой путь по умолчанию
    }

    // Добавьте новую сауну в базу данных (используйте вашу функцию добавления сауны)
    addSauna($name, $type_of_steam_room, $capacity, $swimming_pool, $rest_rooms, $entertainments, $price, $photoPath);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="saunastyles.css">
    <title>Manager Panel</title>
</head>
<body>
    <div class="container">
        <h2>Manager Panel</h2>

        <form action="admin.php" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="type_of_steam_room">Type of Steam Room:</label>
            <input type="text" id="type_of_steam_room" name="type_of_steam_room" required>
            <br>
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required>
            <br>
            <label for="swimming_pool">Swimming Pool:</label>
            <input type="text" id="swimming_pool" name="swimming_pool" required>
            <br>
            <label for="rest_rooms">Rest Rooms:</label>
            <input type="number" id="rest_rooms" name="rest_rooms" required>
            <br>
            <label for="entertainments">Entertainments:</label>
            <input type="text" id="entertainments" name="entertainments" required>
            <br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
            <br>
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
            <br>
            <br>
            <button type="submit" name="add_sauna">Add Sauna</button>
        </form>
        <br>
        <br>
        <a href="saunas.php">Back to Saunas</a>
    </div>
</body>
</html>
