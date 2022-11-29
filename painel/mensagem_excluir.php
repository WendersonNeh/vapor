<?php 

require('./modulos/conexao.php');

$id_suporte = $_GET['id'] ?? NULL;

$suporte_query = "DELETE FROM suporte WHERE id = {$id_suporte}";

mysqli_query($conn, $suporte_query);

header('location: mensagens.php');

?>