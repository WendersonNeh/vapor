<?php 

require('./modulos/conexao.php');

$id_cat = $_GET['id'] ?? null;

$jogo_query = "SELECT * FROM jogo WHERE id_categoria = {$id_cat}";
$jogos = mysqli_query($conn, $jogo_query);


if ($jogos->num_rows == 0) {

    $query_delete_categoria = "DELETE FROM categoria WHERE id = {$id_cat}";
    mysqli_query($conn, $query_delete_categoria);

} else {

    while ($jogo = mysqli_fetch_array($jogos)) {
        $id_jogo = $jogo['id'];
        $query_delete_jogo_plataforma = "DELETE FROM jogo_plataforma WHERE id_jogo = {$id_jogo}";
        $query_delete_jogo_idioma = "DELETE FROM jogo_idioma WHERE id_jogo = {$id_jogo}";
        $query_delete_jogo = "DELETE FROM jogo WHERE id = {$id_jogo}";
        $query_delete_categoria = "DELETE FROM categoria WHERE id = {$id_cat}";

        mysqli_query($conn, $query_delete_jogo_plataforma);
        mysqli_query($conn, $query_delete_jogo_idioma);
        mysqli_query($conn, $query_delete_jogo);

    }

    $query_delete_categoria = "DELETE FROM categoria WHERE id = {$id_cat}";
    mysqli_query($conn, $query_delete_categoria);

}

header('location: categoria.php');

?>