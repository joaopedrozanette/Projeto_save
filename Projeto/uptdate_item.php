<?php
include 'db.php';

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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="codigo_item" value="<?php echo $item['codigo_item']; ?>">
            Item: <input type="text" name="item" value="<?php echo $item['item']; ?>" required><br>
            Tipo: <input type="text" name="tipo_item" value="<?php echo $item['tipo_item']; ?>" required><br>
            Modelo: <input type="text" name="modelo" value="<?php echo $item['modelo']; ?>"><br>
            Quantidade: <input type="number" name="quantidade" value="<?php echo $item['quantidade']; ?>" required><br>
            <input type="submit" value="Atualizar">
        </form>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>
