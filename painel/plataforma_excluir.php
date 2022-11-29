<?php

    require('./modulos/conexao.php');

    $id_plataforma = $_GET['id'] ?? null;

    $jogo_plataforma_query = "DELETE FROM jogo_plataforma WHERE id_plataforma = {$id_plataforma}";
    $idiomas_plataforma = "DELETE FROM plataforma WHERE id = {$id_plataforma}";

    mysqli_query($conn, $jogo_plataforma_query);
    mysqli_query($conn, $idiomas_plataforma);

    header('location: plataforma.php')
?>