<?php
// db_connect.php - File kết nối cơ sở dữ liệu
$host = 'localhost'; // Thay đổi nếu cần
$username = 'root'; // Username MySQL
$password = ''; // Password MySQL
$database = 'goreview';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Kết nối thất bại: ' . $mysqli->connect_error);
}
?>