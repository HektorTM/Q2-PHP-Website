<?php
//session_start();
error_reporting(-1);
ini_set('display_errors', 'on'); // zeigt Errors

require_once __DIR__ . '/includes.php';


define('CONFIG_DIR', __DIR__ . '/conf');
//require_once __DIR__ . '/includes.php'; // included alle dateien von includes.php, hauptsächlich für einen aufgeräumten Code

// definiert die UserID
$userId = getUserID();

// setzt cookies für die UserID
//setcookie('userId', $userId, strtotime('+30 days'));

// Gibt die Produkte an
$strSQL = "SELECT * FROM products ORDER BY title";
$result = mysqli_query(getDB(), $strSQL);


$countCartItems = getCart($userId);

?>