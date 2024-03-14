<?php

$conn = getDB();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from the URL parameter
$productId = $_GET['id'];

// SQL query to fetch product information by ID
$sql = "SELECT id, title, description, price FROM products WHERE id = $productId";
$result = $conn->query($sql);

// Product information array
$productInfo = array();

// Fetch product information from the database
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productInfo = array(
            "id" => $row["id"],
            "title" => $row["title"],
            "description" => $row["description"],
            "price" => $row["price"]
        );
    }
}

// Close connection
$conn->close();

// Send product information as JSON response
echo json_encode($productInfo);
?>
