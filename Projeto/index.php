<?php
include 'db.php';
include 'protect.php';


$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM estoque WHERE item LIKE '%$search%' OR tipo_item LIKE '%$search%' OR modelo LIKE '%$search%'";
$result = $mysql->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
    <a href="index.php">Início</a>
    <a href="add_item.php">Adicionar Novo Item</a>
    <a href="logout.php">Logout</a> <!-- Link para logout -->
</div>
    <div class="container">
        <h1>Controle de Estoque</h1>
        
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Buscar item...">
            <input type="submit" value="Buscar">
        </form>
        
        <table>
            <tr>
                <th>Código</th>
                <th>Item</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["codigo_item"] . "</td>
                            <td>" . $row["item"] . "</td>
                            <td>" . $row["tipo_item"] . "</td>
                            <td>" . $row["modelo"] . "</td>
                            <td>" . $row["quantidade"] . "</td>
                            <td>
                                <a href='editar.php?id=" . $row["codigo_item"] . "'>Editar</a>
                                <a href='delete_item.php?id=" . $row["codigo_item"] . "'>Deletar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum item encontrado</td></tr>";
            }
            $mysql->close();     
            ?>
        </table>
    </div>
</body>
</html>

