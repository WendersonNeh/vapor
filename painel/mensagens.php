<?php

require('./modulos/conexao.php');

$query_suporte = "SELECT id, nome, assunto, mensagem FROM suporte";
$suportes = mysqli_query($conn, $query_suporte);

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
    <title>Mensagens</title>
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
                            <th>Nome</th>
                            <th>Assunto</th>
                            <th class="links">Visualizar</th>
                            <th class="links">Arquivar</th>
                        </tr>
                        <?php while ($suporte = mysqli_fetch_array($suportes)) { ?>

                            <tr>
                                <td><?= $suporte['nome'] ?></td>
                                <td><?= $suporte['assunto'] ?></td>
                                <td class="links"> <a href="mensagens_visualizar.php?id=<?= $suporte['id'] ?>">Visualizar</a></td>
                                <td class="links"> <a href="mensagem_excluir.php?id=<?= $suporte['id'] ?>">Arquivar</a></td>

                            </tr>

                        <?php } ?>

                    </table>

                    <?php if ($suportes->num_rows == 0) { ?>
                        <h1 id="msg_sem">Não há mensagems.</h1>
                    <?php }  ?>
                </div>

            </div>
        </div>

    </div>


</body>

</html>