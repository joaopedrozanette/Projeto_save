<?php
include 'db.php';
include 'protect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $tipo_item = $_POST["tipo_item"];
    $modelo = $_POST["modelo"];
    $quantidade = $_POST["quantidade"];

    $sql = "INSERT INTO estoque (item, tipo_item, modelo, quantidade) VALUES ('$item', '$tipo_item', '$modelo', '$quantidade')";

    if ($mysql->query($sql) === TRUE) {
        echo "Novo item adicionado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $mysql->error;
    }

    $mysql->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;  
            padding: 0;
        }
        .navbar {
            background-color: #28a745;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #218838;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #28a745;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Início</a>
        <a href="add_item.php">Adicionar Novo Item</a>
    </div>
    <div class="container">
        <h1>Adicionar Item</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="item">Item:</label>
            <input type="text" id="item" name="item" required>
            
            <label for="tipo_item">Tipo:</label>
            <input type="text" id="tipo_item" name="tipo_item" required>
            
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo">
            
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>
            
            <input type="submit" value="Adicionar">
        </form>
        <div class="back-link">
            <a href="index.php">Voltar</a>
        </div>
    </div>
</body>
</html>
