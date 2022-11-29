<?php

require('./modulos/conexao.php');

$id_jogo = $_GET['id'] ?? null;

$query_jogo = "SELECT nome FROM jogo WHERE id = {$id_jogo}";
$jogo = mysqli_fetch_assoc(mysqli_query($conn, $query_jogo));

$query_plataformas = "SELECT * FROM plataforma WHERE id IN (SELECT id_plataforma FROM jogo_plataforma WHERE id_jogo = {$id_jogo})";
$plataformas = mysqli_query($conn, $query_plataformas);

$query_plataformas_cadastrar = "SELECT * FROM plataforma WHERE id NOT IN (SELECT id_plataforma FROM jogo_plataforma WHERE id_jogo = {$id_jogo})";
$plataformas_cadastrar = mysqli_query($conn, $query_plataformas_cadastrar);
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
    <title>Novas - Plataformas</title>
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
                            <th>Plataformas - <?= $jogo['nome'] ?> </th>
                            <th class="links">Exluir</th>
                        </tr>
                        <?php while ($plataforma = mysqli_fetch_array($plataformas)) { ?>

                            <tr>
                                <td><?= $plataforma['nome'] ?></td>
                                <td class="links"><a href="jogos_plataformas_excluir.php?id_plataforma=<?= $plataforma['id'] ?>&id_jogo=<?= $id_jogo ?>">Excluir</a></td>
                            </tr>

                        <?php } ?>
                    </table>

                    <?php if ($plataformas->num_rows == 0) { ?>
                        <h1 id="empty-list">Não há plataformas cadastrados para o jogo <?= $jogo['nome'] ?></h1>
                    <?php }  ?>
                </div>

                <div id="select_div">

                    <form action="jogos_plataformas_cadastrar.php" method="post">

                        <select required name="id_plataforma" id="plataforma">
                            <option value="" disabled selected>Selecione um plataforma</option>

                            <?php while ($plataforma = mysqli_fetch_array($plataformas_cadastrar)) { ?>
                                <option value="<?= $plataforma['id'] ?>"><?= $plataforma['nome'] ?></option>
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