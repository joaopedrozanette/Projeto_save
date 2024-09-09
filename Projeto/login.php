<?php
    include 'db_login.php';
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($senha, $user["senha"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"];
        echo "Login realizado com sucesso!";
        
        header("Location: dashboard.php");
        exit();
    } else {
        echo "!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style> 
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: darkblue;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;    
            width: 400px;
            text-align: center;
        }
        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }
        .inputUser {
            width: 95%;
            padding: 10px;
            background: none;
            border: none;
            border-bottom: 1px solid white;
            color: white;
            font-size: 15px;
            outline: none;
        }
        .labelInput {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
            transition: 0.5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #submit {
            background-color: dodgerblue;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: larger;
        }
        #submit:hover{
            background-color: lightblue;
        }
        .cadastro{

        display: inline-block; 
        padding: 10px ; 
        background-color: dodgerblue; 
        color: white; 
        text-align: center; 
        text-decoration: none; 
        border-radius: 5px; 
        border: none; 
        cursor: pointer; 
        font-family: Arial, sans-serif;     
        font-size: 16px; 
        transition: background-color 0.3s ease; 
        }

        .cadastro:hover {
        background-color: lightblue; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="index.php" method="post">
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">Email</label>
            </div>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelInput">Senha</label>
            </div>
            <input type="submit" id="submit" value="Entrar">
        </form>
        <hr>
    
    <a href="cadastro.php" class="cadastro">Não tem cadastro? Clique aqui!</a>
    </div>
</body>
</html>



