<?php
$servername = "localhost";
$username = "root";
$password = "j10140884";
$dbname = "controle_estoque_3";


$mysql = new mysqli($servername, $username, $password, $dbname);


if ($mysql->connect_error) {
    die("Conexão falhou: " . $mysql->connect_error);
}
?>