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
    <title>Jogos</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php');
            $jogos_query = "SELECT id, nome FROM jogo";
            $jogos = mysqli_query($conn, $jogos_query);
            ?>

            <div id="sub-container">

                <div class="button_add">

                    <a href="jogos_cadastrar.php">
                        <button class="button_">Novo Jogo</button>
                    </a>

                </div>

                <div class="tabela">
                    <table>
                        <tr>
                            <th>Jogos</th>
                            <th class="links">Idioma</th>
                            <th class="links">Plataforma</th>
                            <th class="links">Editar</th>
                            <th class="links">Exluir</th>
                        </tr>
                        <?php while ($jogo = mysqli_fetch_array($jogos)) { ?>

                            <tr>
                                <td><?= $jogo['nome'] ?></td>
                                <td class="links"><a href="jogos_idiomas.php?id=<?= $jogo['id'] ?>">Idiomas</a></td>
                                <td class="links"><a href="jogos_plataforma.php?id=<?= $jogo['id'] ?>">Plataforma</a></td>
                                <td class="links"><a href="jogos_editar.php?id=<?= $jogo['id'] ?>">Editar</a></td>
                                <td class="links"><a href="jogos_excluir.php?id=<?= $jogo['id'] ?>">Excluir</a></td>
                            </tr>

                        <?php } ?>

                    </table>
                
                    <?php if ($jogos->num_rows == 0) { ?>
                        <h1 id="msg_sem">Não há jogo cadastrado, insira novos jogos.</h1>
                    <?php }  ?>

                </div>

            </div>
        </div>

    </div>


</body>

</html>