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
    <title>Categoria</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php');
            $categoria_query = "SELECT id, nome FROM categoria";
            $categorias = mysqli_query($conn, $categoria_query);
            ?>

            <div id="sub-container">

                <div class="button_add">

                    <a href="categoria_cadastrar.php">
                        <button class="button_">Nova Categoria</button>
                    </a>

                </div>

                <div class="tabela">
                    <table>
                        <tr>
                            <th>Categoria</th>
                            <th class="links">Editar</th>
                            <th class="links">Exluir</th>
                        </tr>
                        <?php while ($categoria = mysqli_fetch_array($categorias)) { ?>

                            <tr>
                                <td><?= $categoria['nome'] ?></td>
                                <td class="links"><a href="categoria_editar.php?id=<?= $categoria['id'] ?>">Editar</a></td>
                                <td class="links"><a href="categoria_excluir.php?id=<?= $categoria['id'] ?>">Excluir</a></td>
                            </tr>

                        <?php } ?>

                    </table>
                            
                    <?php if ($categorias->num_rows == 0) { ?>
                        <h1 id="msg_sem">Não há categoria cadastrado, insira novas categorias.</h1>
                    <?php }  ?>

                </div>

            </div>
        </div>

    </div>


</body>

</html>