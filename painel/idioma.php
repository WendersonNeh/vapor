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
    <title>Idiomas</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php');
            $idiomas_query = "SELECT id, nome FROM idioma";
            $idiomas = mysqli_query($conn, $idiomas_query);
            ?>

            <div id="sub-container">

                <div class="button_add">

                    <a href="idioma_cadastrar.php">
                        <button class="button_">Novo Idioma</button>
                    </a>

                </div>

                <div class="tabela">
                    <table>
                        <tr>
                            <th>Idiomas</th>
                            <th class="links">Editar</th>
                            <th class="links">Exluir</th>
                        </tr>
                        <?php while ($idioma = mysqli_fetch_array($idiomas)) { ?>

                            <tr>
                                <td><?= $idioma['nome'] ?></td>
                                <td class="links"><a href="idioma_editar.php?id=<?= $idioma['id'] ?>">Editar</a></td>
                                <td class="links"><a href="idioma_excluir.php?id=<?= $idioma['id'] ?>">Excluir</a></td>
                            </tr>

                        <?php } ?>

                    </table>

                    <?php if ($idiomas->num_rows == 0) { ?>
                        <h1 id="msg_sem">Não há idioma cadastrado, insira novos idiomas.</h1>
                    <?php }  ?>

                </div>

            </div>
        </div>

    </div>


</body>

</html>