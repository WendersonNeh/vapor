<?php

require('./modulos/conexao.php');

$id_jogo = $_GET['id'] ?? null;

$query_jogo = "SELECT id, nome FROM jogo WHERE id = {$id_jogo}";
$jogo = mysqli_fetch_assoc(mysqli_query($conn, $query_jogo));

$query_idiomas = "SELECT * FROM idioma WHERE id IN (SELECT id_idioma FROM jogo_idioma WHERE id_jogo = {$id_jogo})";
$idiomas = mysqli_query($conn, $query_idiomas);

$query_idiomas_cadastrar = "SELECT * FROM idioma WHERE id NOT IN (SELECT id_idioma FROM jogo_idioma WHERE id_jogo = {$id_jogo})";
$idiomas_cadastrar = mysqli_query($conn, $query_idiomas_cadastrar);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/global.css">
    <link rel="stylesheet" href="assets/normalize.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Novos - idiomas</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php') ?>
            <div id="sub-container">

                <div class="tabela">
                    <table>
                        <tr>
                            <th>Idiomas - <?= $jogo['nome'] ?> </th>
                            <th class="links">Exluir</th>
                        </tr>
                        <?php while ($idioma = mysqli_fetch_array($idiomas)) { ?>

                            <tr>
                                <td><?= $idioma['nome'] ?></td>
                                <td class="links"><a href="jogos_idiomas_excluir.php?id_idioma=<?= $idioma['id'] ?>&id_jogo=<?= $id_jogo ?>">Excluir</a></td>
                            </tr>

                        <?php } ?>
                    </table>

                    <?php if ($idiomas->num_rows == 0) { ?>
                        <h1 id="empty-list">Não há idiomas cadastrados para o jogo <?= $jogo['nome'] ?></h1>
                    <?php }  ?>
                </div>

                <div id="select_div">

                    <form action="jogos_idiomas_cadastrar.php" method="post">

                        <select required name="id_idioma" id="idioma">
                            <option value="" disabled selected>Selecione um Idioma</option>

                            <?php while ($idioma = mysqli_fetch_array($idiomas_cadastrar)) { ?>
                                <option value="<?= $idioma['id'] ?>"><?= $idioma['nome'] ?></option>
                            <?php } ?>

                        </select>

                        <input type="hidden" value="<?= $id_jogo ?>" name="id_jogo">

                        <div id="button_editar2">
                            <button class="button_editar2" type="submit">Cadastrar</button>
                        </div>

                    </form>

                </div>


            </div>

        </div>
</body>

</html>