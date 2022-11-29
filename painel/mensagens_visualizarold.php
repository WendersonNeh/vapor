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

            <?php require('./modulos/top-menu.php') ?>

            <div id="sub-container">
                <div id="tabela_msg">
                    <?php while ($suporte = mysqli_fetch_array($suportes)) { ?>

                        <div class="teste">
                            <span>Nome = <?= $suporte['nome'] ?></span>
                        </div>

                        <div class="teste">
                            <span>Email = <?= $suporte['email'] ?></span>
                        </div>

                        <div class="teste">
                            <span>Assunto = <?= $suporte['assunto'] ?></span>
                        </div>

                        <div class="teste">
                            <span>Mensagem = <?= $suporte['mensagem'] ?></span>
                        </div>

                    <?php } ?>
                </div>

            </div>

        </div>


</body>

</html>