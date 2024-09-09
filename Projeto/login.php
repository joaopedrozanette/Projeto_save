<?php

    include 'db_login.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a consulta para verificar o usuário
    $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $senha_hash);
        $stmt->fetch();

        // Verificar se a senha corresponde
        if (password_verify($senha, $senha_hash)) {
            echo "Login realizado com sucesso!";
            // Iniciar a sessão e salvar dados do usuário
            session_start();
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_email'] = $email;
            header("Location: index.php"); // Redirecionar para página de boas-vindas
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Nenhum usuário encontrado com esse email.";
    }

    $stmt->close();
}
$conn->close();
?>
