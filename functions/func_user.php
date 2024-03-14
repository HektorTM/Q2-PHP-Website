<?php


function getUserID()
{
    $userId = random_int(0, time()); //userId mit timestamp damit sehr unwahrscheinlich die gleiche ID generiert wird
    if (isset($_SESSION['userId'])) {
        $userId = (int) $_SESSION['userId'];
    }
    if (isset($_COOKIE['userId'])) {
        $userId = (int) $_COOKIE['userId'];
    }
    return $userId;
}

function getUserData(string $username)
{
    $sql = "SELECT id, password FROM users WHERE username = ?";

    $conn = getDB(); 

    $statement = $conn->prepare($sql);

    if (!$statement) {
        return ['id' => null, 'password' => null];
    }

    $statement->bind_param('s', $username);
    $statement->execute();

    $result = $statement->get_result();

    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    $statement->close();

    return $row ?: ['id' => null, 'password' => null]; // Return $row if it exists, otherwise return an array with default values
}

function isLoggedIn(): bool
{
    return isset($_SESSION["Login"]);
}