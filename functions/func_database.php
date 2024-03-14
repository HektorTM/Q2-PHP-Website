<?php
define('DB_DATABASE', 'shop');
define('DB_USER', 'shop');
define('DB_PASSWORD', '123456');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');

function getDB(){
    static $db;
    if($db instanceof mysqli) { // Abfrage ob $db schon als instanz existiert
        return $db;
    }

    //require_once CONFIG_DIR . '/conf_database.php';
    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    return $db;
}