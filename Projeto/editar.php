<?php
include 'db.php';
include 'protect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $codigo_item = $_GET["id"];
    $sql = "SELECT * FROM estoque WHERE codigo_item = $codigo_item";
    $result = $mysql->query($sql);
    $item = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_item = $_POST["codigo_item"];
    $item = $_POST["item"];
    $tipo_item = $_POST["tipo_item"];
    $modelo = $_POST["modelo"];
    $quantidade = $_POST["quantidade"];

    $sql = "UPDATE estoque SET item='$item', tipo_item='$tipo_item', modelo='$modelo', quantidade='$quantidade' WHERE codigo_item=$codigo_item";

    if ($mysql->query($sql) === TRUE) {
        echo "Item atualizado com sucesso";
        header("location:index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Início</a>
        <a href="add_item.php">Adicionar Novo Item</a>
    </div>

    <div class="container">
        <h1>Atualizar Item</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="update-form">
            <input type="hidden" name="codigo_item" value="<?php echo $item['codigo_item']; ?>">

            <div class="form-group">
                <label for="item">Item:</label>
                <input type="text" name="item" id="item" value="<?php echo $item['item']; ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo_item">Tipo:</label>
                <input type="text" name="tipo_item" id="tipo_item" value="<?php echo $item['tipo_item']; ?>" required>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" value="<?php echo $item['modelo']; ?>">
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" value="<?php echo $item['quantidade']; ?>" required>
            </div>

            <div class="form-buttons">
                <input type="submit" value="Atualizar" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>

<style>
     /* Estilo geral */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Navbar */
.navbar {
    background-color: darkgreen;
    padding: 15px;
    text-align: center;
}

.navbar a {
    color: white;
    padding: 14px 20px;
    text-decoration: none;
    text-transform: uppercase;
    margin: 0 10px;
    display: inline-block;
}

.navbar a:hover {
    background-color: #575757;
}

/* Container */
.container {
    max-width: 800px;
    margin: 10px auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Título */
h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 24px;
    color: #333;
}

/* Formulário */
.update-form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 10px;
}

.form-group label {
    font-size: 16px;
    color: #333;
    margin-bottom: 5px;
    display: block;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

.form-group input:focus {
    border-color: #007BFF;
    outline: none;
}

/* Botões */
.form-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 5px;
}

.btn {
    padding: 11px 20px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 16px;
    color: white;
    cursor: pointer;
    text-align: center;
}

.btn-primary {
    background-color: #007BFF;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

</style>