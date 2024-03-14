<?php

function addToCart(int $userId, int $productId)
{
    $strSQL = "INSERT INTO cart SET user_id = ?, product_id = ?";
    $statement = getDB()->prepare($strSQL);

    if (!$statement) {
        die("Error in preparing the SQL statement: " . getDB()->error);
    }

    $statement->bind_param('ii', $userId, $productId);
    $statement->execute();

}

function removeFromCart(int $userId, int $productId)
{
    $strSQL = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
    $statement = getDB()->prepare($strSQL);

    if (!$statement) {
        die("Error in preparing the SQL statement: " . getDB()->error);
    }

    $statement->bind_param('ii', $userId, $productId);
    $statement->execute();

}

function getCart(int $userId)
{
    $strSQL = "SELECT COUNT(id) FROM cart WHERE user_id=" . $userId;
    $cartResults = mysqli_query(getDB(), $strSQL);
    if (!$cartResults) {
        return 0;
    }


    $cartRow = mysqli_fetch_assoc($cartResults);
    $cartItems = $cartRow['COUNT(id)'];
    return $cartItems;
}

function getCartItemsForUID(int $userId): array
{
    $sql = "SELECT product_id,title,description,price,quantity
        FROM cart
        JOIN products ON(cart.product_id = products.id)
        WHERE user_id = " . $userId;
    $result = getDb()->query($sql);
    if ($result === false) {
        return [];
    }
    $found = [];
    while ($row = $result->fetch_assoc()) {
        $found[] = $row;
    }
    return $found;
}

function getCartIdsForUID(int $userId): array {
    $sql = "SELECT product_id
            FROM cart
            WHERE user_id = " . $userId;
    $result = getDb()->query($sql);
    if ($result === false) {
        return [];
    }
    $found = [];
    while ($row = $result->fetch_assoc()) {
        $found[] = $row['product_id'];
    }
    return $found;
}

//function getCartSumForUID(int $userId): int
//{
//    $sql = "SELECT SUM(price)
//          FROM cart
//          JOIN products ON(cart.product_id = products.id)
//          WHERE user_id = " . $userId;
//    $result = getDb()->query($sql);
//    if ($result === false) {
//        return 0;
//    }
//    return (int) $result->fetch_assoc();
//}

function getCartSumForUID(int $userId): int
{
    $sql = "SELECT SUM(price) AS total_price
          FROM cart
          JOIN products ON (cart.product_id = products.id)
          WHERE user_id = " . $userId;
    $result = getDb()->query($sql);
    if ($result === false) {
        return 0;
    }
    $row = $result->fetch_assoc();
    return isset($row['total_price']) ? (int) $row['total_price'] : 0;
}


function isProductInCart($productId) {
    $userId = getUserID();
    $userCart = getCartIdsForUID($userId);

    return in_array($productId, $userCart);
}