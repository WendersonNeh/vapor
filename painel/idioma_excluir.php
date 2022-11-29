<?php

    require('./modulos/conexao.php');

    $id_idioma = $_GET['id'] ?? null;

    $jogo_idioma_query = "DELETE FROM jogo_idioma WHERE id_idioma = {$id_idioma}";
    $idiomas_query = "DELETE FROM idioma WHERE id = {$id_idioma}";

    mysqli_query($conn, $jogo_idioma_query);
    mysqli_query($conn, $idiomas_query);

    header('location: idioma.php')
?>