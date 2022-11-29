<?php

require('./modulos/conexao.php');

$nome_idioma = $_POST['idioma1'] ?? null;

$consultar_idioma = "SELECT nome FROM idioma WHERE nome = ('{$nome_idioma}')";

$novo_idioma = "INSERT into idioma (nome)  VALUES ('{$nome_idioma}')";

$idioma = mysqli_fetch_assoc(mysqli_query($conn, $consultar_idioma));


if ($idioma == null) {
    mysqli_query($conn, $novo_idioma);
    header("location: idioma.php");
} else {
    header("location: idioma_cadastrar.php?error_msg=Idioma já existente");
}

?>