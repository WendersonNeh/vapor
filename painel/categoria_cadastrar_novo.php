<?php

require('./modulos/conexao.php');

$nome_categoria = $_POST['idioma1'] ?? null;

$consultar_cat = "SELECT nome FROM categoria WHERE nome = ('{$nome_categoria}')";

$novo_categroia = "INSERT into categoria (nome)  VALUES ('{$nome_categoria}')";

$categoria = mysqli_fetch_assoc(mysqli_query($conn, $consultar_cat));


if ($categoria == null) {
    mysqli_query($conn, $novo_categroia);
    header("location: categoria.php");
} else {
    header("location: categoria_cadastrar.php?error_msg=Categoria já existente");
}

?>