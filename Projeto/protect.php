<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header("Location: login.html");
    exit();
}
?>
