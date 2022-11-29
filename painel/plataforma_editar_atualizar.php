<?php

require('./modulos/conexao.php');

$nome_plataforma = $_POST['idioma1'] ?? null;

$id_plataforma = $_POST['id'] ?? null;

$search_plataforma = "SELECT nome FROM plataforma WHERE nome = '{$nome_plataforma}' AND id != '{$id_plataforma}'";

$plataforma = mysqli_fetch_assoc(mysqli_query($conn, $search_plataforma));

$update_plataforma = "UPDATE plataforma SET nome = '{$nome_plataforma}' WHERE id = {$id_plataforma}";

if ($plataforma == null) {
    mysqli_query($conn, $update_plataforma);
    header("location: plataforma.php");
 } else {
     header("location: plataforma_editar.php?error_msg=Plataforma já existente&id={$id_plataforma}");
 }

?>