<?php
// db_connect.php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "tracker";
try {
    $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
    $connection = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions on errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch associative arrays by default
    ]);
    echo " ";
} catch (PDOException $e) {
    echo "Not connected: " . $e->getMessage();
    exit; // Stop further execution if connection fails
}
?>
