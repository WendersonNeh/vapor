<?php

require('./modulos/conexao.php');

$nome_plataforma = $_POST['idioma1'] ?? null;

$consultar_plat = "SELECT nome FROM plataforma WHERE nome = ('{$nome_plataforma}')";

$novo_plat = "INSERT into plataforma (nome)  VALUES ('{$nome_plataforma}')";

$plataforma = mysqli_fetch_assoc(mysqli_query($conn, $consultar_plat));


if ($plataforma == null) {
    mysqli_query($conn, $novo_plat);
    header("location: plataforma.php");
} else {
    header("location: plataforma_cadastrar.php?error_msg=Plataforma já existente");
}

?>