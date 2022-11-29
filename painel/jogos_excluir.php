<?php

    require('./modulos/conexao.php');

    $id_jogo = $_GET['id'] ?? null;

    $jogo_plataforma_query = "DELETE FROM jogo_plataforma WHERE id_jogo = {$id_jogo}";
    $jogo_idioma_query = "DELETE FROM jogo_idioma WHERE id_jogo = {$id_jogo}";
    $delete_jogo = "DELETE FROM jogo WHERE id = {$id_jogo}";

    mysqli_query($conn, $jogo_plataforma_query);
    mysqli_query($conn, $jogo_idioma_query);
    mysqli_query($conn, $delete_jogo);

    header('location: jogos.php')
?>