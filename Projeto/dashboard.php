<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION["nome"]); ?>!</h2>
        <p>Você está logado!</p>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>
