<?php

// Function to check if an account exists
function checkForAcc($username) {
    // Connect to your database (replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials)
    $conn = getDB();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize input
    $username = mysqli_real_escape_string($conn, $username);

    // Check if account already exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}

// Function to login
function login($username, $password) {
    // Connect to your database (replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials)
    $conn = getDB();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize input
    $username = mysqli_real_escape_string($conn, $username);

    // Check if account exists
    if (checkForAcc($username)) {
        // Retrieve stored password hash from the database
        $query = "SELECT password FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Error in query: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        $storedPasswordHash = $row['password'];

        // Verify password using the older MD5 hashing (replace this with a more secure hashing algorithm if possible)
        if (md5($password) === $storedPasswordHash) {
            echo "Login successful for username: $username";
        } else {
            echo "Incorrect password for username: $username";
            echo "Password try: $password | Actual Password: $storedPasswordHash";
        }
    } else {
        echo "Account not found for username: $username";
    }
}

