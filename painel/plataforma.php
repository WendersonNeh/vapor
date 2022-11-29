<?php

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
    <title>Plataforma</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php');
            $plataformas_query = "SELECT id, nome FROM plataforma";
            $plataformas = mysqli_query($conn, $plataformas_query);
            ?>

            <div id="sub-container">

                <div class="button_add">

                    <a href="plataforma_cadastrar.php">
                        <button class="button_">Nova Plataforma</button>
                    </a>

                </div>

                <div class="tabela">
                    <table>
                        <tr>
                            <th>Plataforma</th>
                            <th class="links">Editar</th>
                            <th class="links">Exluir</th>
                        </tr>
                        <?php while ($plataforma = mysqli_fetch_array($plataformas)) { ?>

                            <tr>
                                <td><?= $plataforma['nome'] ?></td>
                                <td class="links"><a href="plataforma_editar.php?id=<?= $plataforma['id'] ?>">Editar</a></td>
                                <td class="links"><a href="plataforma_excluir.php?id=<?= $plataforma['id'] ?>">Excluir</a></td>
                            </tr>

                        <?php } ?>

                    </table>

                    <?php if ($plataformas->num_rows == 0) { ?>
                        <h1 id="msg_sem">Não há plataforma cadastrada, insira novas plataformas.</h1>
                    <?php }  ?>

                </div>

            </div>
        </div>

    </div>


</body>

</html>