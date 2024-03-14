<?php
require_once __DIR__ . '/includes.php';
// Define a default value for REQUEST_URI if it's not set
if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}

$userId = getUserID();

define('SITE_ABOUT', '/templates/about.html ');
define('SITE_HOME', '/templates/home.php');
define('SITE_MEMBERS', '/templates/members.html');
define('SITE_TOURS', '/templates/tours.html');
define('SITE_MERCH', '/templates/merch.php');
define('SITE_IMPRESSUM', '/templates/impressum.php');

require_once __DIR__ . '/functions/func_cart.php'; // Warenkorb

$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url, 'index.php');
$baseUrl = substr($url, 0, $indexPHPPosition); // base href


// route == null -> home
$route = null;
if (false !== $indexPHPPosition) {
    $route = substr($url, $indexPHPPosition);
    $route = str_replace('index.php', '', $route);
}


$countCartItems = getCart($userId);

// no route
if (!$route) {

    require __DIR__ . SITE_HOME;
    exit();
}
// Merch
if (strpos($route, '/merch') !== false) {
    $strSQL = "SELECT * FROM products ORDER BY title";
    $result = mysqli_query(getDB(), $strSQL);

    require __DIR__ . SITE_MERCH;
    exit();
}

// Cart + Add/Remove
if (strpos($route, '/cart/add/') !== false) {

    $routeParts = explode("/", $route);
    $productId = (int) $routeParts[3];

    addToCart($userId, $productId);

    var_dump($userId);
    var_dump($productId);

    header("Location: " . $baseUrl . "index.php/merch");
    exit();
}
if (strpos($route, '/cart/remove/') !== false) {
    $routeParts = explode("/", $route);
    $productId = (int) $routeParts[3];

    removeFromCart($userId, $productId);

    header("Location: " . $baseUrl . "index.php/cart");
    exit();
}
if (strpos($route, '/cart') !== false) {
    $cartItems = getCartItemsForUID($userId);
    $cartSum = getCartSumForUID($userId);

    var_dump($userId);

    require __DIR__ . '/templates/cartPage.php';
    exit();
}



// Generic Sites
if (strpos($route, '/home') !== false) {
    require __DIR__ . SITE_HOME;
    exit();
}
if (strpos($route, '/about') !== false) {
    require __DIR__ . SITE_ABOUT;
    exit();
}
if (strpos($route, '/tours') !== false) {
    require __DIR__ . SITE_TOURS;
    exit();
}
if (strpos($route, '/members') !== false) {
    require __DIR__ . SITE_MEMBERS;
    exit();
}
if (strpos($route, '/impressum') !== false) {
    require __DIR__ . SITE_IMPRESSUM;
    exit();
}

// Login/out and Registration
if (strpos($route, '/login') !== false) {
    require __DIR__ . '/templates/loginPage.php';
    exit();
}

if (strpos($route, '/register') !== false) {
    require __DIR__ . '/templates/registerPage.php';
    exit();
}
if (strpos($route, '/logout') !== false) {
    session_start();
    $_SESSION = [];
    session_destroy();
    setcookie('userId', "", time() - 36000, "/");
    setcookie('username', "", time() - 36000, "/");
    header("Location: /index.php/merch");
    exit();
}

// Member Sites || WIP
if (strpos($route, '/members/ ') !== false) {
    $routeParts = explode('/', $route);


    if ($routeParts[1] === 'members' && isset($routeParts[2])) {
        $memberId = $routeParts[2];
        echo "<script>console.log('Member ID: $memberId');</script>";

        switch ($memberId) {
            case '0':
            case '1':
            case '2':
            case '3':
            case '4':
            case '5':
            case '6':
            case '7':
            case '8':
                require __DIR__ . "/templates/members/" . $memberId . ".html";
                exit();
            case 'J':
                require __DIR__ . '/templates/members/J.php';
                exit();
            case 'V':
                require __DIR__ . '/templates/members/V.php';
                exit();
            case 'M':
                require __DIR__ . '/templates/members/M.php';
                exit();
            default:
                // Handle cases where the member ID doesn't match any expected value
                echo "Invalid member ID: $memberId";
                break;
        }
    } else {
        // Handle cases where the route doesn't match the expected pattern
        echo "Invalid route: $route";
    }

}
