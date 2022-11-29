<?php

require('./modulos/conexao.php');

$nome_cat = $_POST['idioma1'] ?? null;

$id_cat = $_POST['id'] ?? null;

$search_cat = "SELECT nome FROM categoria WHERE nome = '{$nome_cat}' AND id != '{$id_cat}'";

$categoria = mysqli_fetch_assoc(mysqli_query($conn, $search_cat));

$update_idioma = "UPDATE categoria SET nome = '{$nome_cat}' WHERE id = {$id_cat}";

if ($categoria == null) {
    mysqli_query($conn, $update_idioma);
    header("location: categoria.php");
 } else {
     header("location: categoria_editar.php?error_msg=Categoria já existente&id={$id_cat}");
 }

?>