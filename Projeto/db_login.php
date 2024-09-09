<?php   
$servername = "localhost";
$username = "root";
$password = "j10140884";
$dbname = "usuarios";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>