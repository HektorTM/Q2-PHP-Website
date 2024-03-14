<?php
$db = getDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $password = mysqli_real_escape_string($db, $_POST["pw"]);
    $password2 = mysqli_real_escape_string($db, $_POST["pw2"]);

    if ($password !== $password2) {
        echo "Passwords do not match";
        header("Location: /index.php/about");
        exit();
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists";
        header("Location: /index.php/home");
        exit();
    }

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($db, $query)) {
        echo "User registered successfully";
        header("Location: /index.php/login");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}
?>