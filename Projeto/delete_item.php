<?php
include 'db.php';
include 'protect.php';

if (isset($_GET["id"])) {
    $codigo_item = $_GET["id"];

    $sql = "DELETE FROM estoque WHERE codigo_item = $codigo_item";

    if ($mysql->query($sql) === TRUE) {
        echo "Item deletado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $mysql->error;
    }

    $mysql->close();
    header("Location: index.php");
}
?>
