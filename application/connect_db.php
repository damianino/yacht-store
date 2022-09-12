<?
$servername = "127.0.0.1";
$database = "yacht.com";
$username = "root";
$password = "";
// Устанавливаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
?>