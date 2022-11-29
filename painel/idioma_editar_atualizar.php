<?php

require('./modulos/conexao.php');

$nome_idioma = $_POST['idioma1'] ?? null;

$id_idioma = $_POST['id'] ?? null;

$search_idioma = "SELECT nome FROM idioma WHERE nome = '{$nome_idioma}' AND id != '{$id_idioma}'";

$idioma = mysqli_fetch_assoc(mysqli_query($conn, $search_idioma));

$update_idioma = "UPDATE idioma SET nome = '{$nome_idioma}' WHERE id = {$id_idioma}";

if ($idioma == null) {
    mysqli_query($conn, $update_idioma);
    header("location: idioma.php");
 } else {
     header("location: idioma_editar.php?error_msg=Idioma já existente&id={$id_idioma}");
 }

?>