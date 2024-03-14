<?=
session_start();
error_reporting(-1);
ini_set('display_errors', 'on'); // zeigt Errors

require_once __DIR__ . '/functions/func_database.php'; // f�r database


define('CONFIG_DIR', __DIR__ . '/conf');

$username = "test";
$password = password_hash("test", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$statement = getDB()->prepare($sql);

$statement->bind_param("ss", $username, $password);

$success = $statement->execute();
if(!$success){
    echo "FEHLER";
}