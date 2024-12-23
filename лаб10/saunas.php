<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            text-align: center;
        }

        a {
            font-size: 24px;
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    require_once('db.php');

    if (!isset($_SESSION['user_id'])) {
        header("Location: index.html");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $sql_role = "SELECT role FROM users WHERE id=$user_id";
    $result_role = $conn->query($sql_role);

    if ($result_role->num_rows > 0) {
        $user_role = $result_role->fetch_assoc()['role'];

        if ($user_role === 'admin') {
            echo '<a href="admin.php"><br>Go to Manager Page</a>';
        }
    }
    ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="saunastyles.css">
    <title>Saunas</title>
</head>
<body>
    <div class="saunacontainer">
        <h2>Our Saunas</h2>
    </div>

<div class="container">
    <form id="phoneForm">
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" pattern="89\d{9}" required>
        <?php
            if (isset($_SESSION['user_id'])) {
                echo '<button type="button" onclick="openApplication()">Add</button>';
            } else {
                echo '<p>Login to add a phone number</p>';
            }
        ?>
        <p> Leave your phone number so that we can call you back. The number format is 89XXXXXXXXX</p>
    </form>
</div>

    <div class="saunacontainer">
        <h3>Main Saunas</h3>
    </div>

    <div class="saunacontainer">
        <div class="sauna">
            <img src="sauna1.jpg" alt="Sauna 1" width="800" height="700">
            <h3><a href="Odyssey.html">Odyssey Sauna</a></h3>
            <p> Type of steam room: Turkish Hammam / Finnish sauna / Japanese bathhouse
                <br>Capacity - 8
                <br>Swimming pool: 3x6 meters, waterfall, geyser, artificial current, font, pouring bucket, shower
                <br>Rest rooms - 2
                <br>Entertainments: Billiards, board games, hookah, satellite TV, karaoke, audio center, WI-FI, home theater, wood-burning fireplace, massage chair</p>
            <p>Price: 100$ per hour</p>
        </div>

        <div class="sauna">
            <img src="sauna2.jpg" alt="Sauna 2" width="600" height="400">
            <h3><a href="hype.html">Sauna HYPE</a></h3>
            <p> Type of steam room: Finnish sauna
                <br>Capacity - 15
                <br>Swimming pool: 2.5x 3.5x 1.5 meters, warm, shower
                <br>Rest rooms - 1
                <br>Entertainments: Board games, Wi-Fi, audio center, satellite TV, karaoke, light music, massage chair, hookah</p>
            <p>Price: 140$ per hour</p>
        </div>
        <div class="sauna">
            <img src="sauna3.jpg" alt="Sauna 3" width="800" height="700">
            <h3><a href="maximum.html">Sauna Maximum</a></h3>
            <p> Type of steam room: Turkish Hammam / Japanese bath
                <br>Capacity - 5
                <br>Swimming pool: 3x4 meters, hydro massage, waterfall, shower
                <br>Rest rooms - 2
                <br>Entertainments: Audio center, WI-FI, satellite TV, karaoke, hookah</p>
            <p>Price: 75$ per hour</p>
        </div>

        <div class="sauna">
            <img src="sauna4.jpg" alt="Sauna 4" width="800" height="700">
            <h3><a href="extra.html">Sauna Extra</a></h3>
            <p> Type of steam room: Finnish sauna
                <br>Capacity - 5
                <br>Swimming pool: 2x3 meters, geyser, shower
                <br>Rest rooms - 1
                <br>Entertainments: Wi-Fi, audio center, satellite TV, karaoke, home theater, massage chair, board games</p>
            <p>Price: 90$ per hour</p>
        </div>



        <div class="container">
            <p align="center" style="color:#4CAF50">new saunas</p>
        </div>




         <?php
        $sql_saunas = "SELECT * FROM saunas";
        $result_saunas = $conn->query($sql_saunas);
        if ($result_saunas->num_rows > 0) {
            while ($row = $result_saunas->fetch_assoc()) {
                echo '<div class="sauna">';
                echo '<img src="' . $row['photo_path'] . '" alt="' . $row['name'] . '" width="800" height="700">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>Type of steam room: ' . $row['type_of_steam_room'] . '<br>';
                echo 'Capacity - ' . $row['capacity'] . '<br>';
                echo 'Swimming pool: ' . $row['swimming_pool'] . '<br>';
                echo 'Rest rooms - ' . $row['rest_rooms'] . '<br>';
                echo 'Entertainments: ' . $row['entertainments'] . '</p>';
                echo '<p>Price: ' . $row['price'] . '$ per hour</p>';
                echo '</div>';
            }
        } else {
            echo 'No saunas available.';
        }
        $conn->close();
        ?>
    </div>

    <div class="container">
        <div class="contacts">

            <div class="contact-block">
                <h4>Our Phone Number</h4>
                <p>+7 995 388-24-51</p>
            </div>

            <div class="contact-block">
                <h4>Second Phone Number</h4>
                <p>+7 950 387-52-39</p>
            </div>

            <div class="contact-block">
                <h4>Social Media</h4>
                <p><a href="https://vk.com/thebestbrawler"> My VK page</a></p>
            </div>

            <div class="contact-block">
                <h4>Your profile</h4>
                <a href="dashboard.php">Back to Dashboard</a>
            </div>
        </div>
    </div>

<script>
function openApplication() {
    var phoneNumberInput = document.getElementById('phoneNumber');
    var phoneNumber = phoneNumberInput.value;

    var phoneNumberRegex = /^89\d{9}$/;
    if (phoneNumberRegex.test(phoneNumber)) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Your phone number has been added to the database.");
            }
        };
        xmlhttp.open("GET", "add_phone_number.php?phone=" + phoneNumber, true);
        xmlhttp.send();
    } else {
        alert("Invalid phone number format. Please enter a valid number.");
    }
}
</script>

</body>
</html>
