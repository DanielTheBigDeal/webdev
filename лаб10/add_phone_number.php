<?php
session_start();
require_once('db.php');

if (isset($_GET['phone'])) {
    $phone = mysqli_real_escape_string($conn, $_GET['phone']);
    $current_time = date('Y-m-d H:i:s'); // Получаем текущее время

    $sql = "INSERT INTO phone_numbers (phone_number, time_added) VALUES ('$phone', '$current_time')";
    if ($conn->query($sql) === TRUE) {
        echo "Phone number added successfully.";
    } else {
        echo "Error adding phone number: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
