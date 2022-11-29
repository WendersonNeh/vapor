<?php
require('./modulos/conexao.php');

$id_suporte = $_GET['id'] ?? null;

$query_suporte = "SELECT id, nome, email, assunto, mensagem FROM suporte where id = {$id_suporte}";
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
    <title>Visualizar - Mensagens</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php')


            ?>

            <div id="sub-container">

                <div id="novos_jogos">
                    <?php while ($suporte = mysqli_fetch_array($suportes)) { ?>
                        <form action="jogos_editar_novo.php" method="post">
                            <div class="ao_lado">

                                <div class="inputs_jogos full">
                                    <label for="name">Nome</label>
                                    <input type="text" value="<?= $suporte['nome'] ?>">
                                </div>

                                <div class="inputs_jogos full">
                                    <label for="price">Assunto</label>
                                    <input type="text" value="<?= $suporte['assunto'] ?>">
                                </div>

                                <div class="inputs_jogos full">
                                    <label for="image_url">E-mail</label>
                                    <input type="text" value="<?= $suporte['email'] ?>">
                                </div>

                            </div>

                            <div class="ao_lado">
                                <div class="inputs_jogos full">
                                    <label for="descricao">Mensagem</label>
                                    <textarea name="descricao" id="descricao" rows="10" cols="30"><?= $suporte['mensagem'] ?></textarea>
                                </div>
                            </div>
                        </form>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>