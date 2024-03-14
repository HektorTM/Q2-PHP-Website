<?php

$conn = getDB();

if (isset($_POST["username"]) && isset($_POST["pw"])) {
    $username = $_POST["username"];
    $password = $_POST["pw"];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = mysqli_query($conn, $stmt);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["Login"] = "YES";
            setcookie('userId', $user['id'], strtotime('+30 days'));
            header("Location: /index.php/merch");
            exit();
        } else {
            // Incorrect password
            header("Location: /index.php/home");
            exit();
        }
    } else {
        // User does not exist
        header("Location: /index.php/about");
        exit();
    }
}

$conn->close();


?>