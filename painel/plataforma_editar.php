<?php
require('./modulos/conexao.php');

$id_plataforma = $_GET['id'] ?? null;

$search_plataformas = "SELECT nome FROM plataforma WHERE id = '{$id_plataforma}'";
$plataforma = mysqli_fetch_assoc(mysqli_query($conn, $search_plataformas));

$Error = $_GET['error_msg'] ?? null;

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
    <title>Editar - Plataforma</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php') ?>

            <div id="sub-container">

                <div class="formulario_novos_idiomas">
                    <form id="formulario_idioma" action="plataforma_editar_atualizar.php" method="POST">
                        <br> <label for="novo_idioma"><strong>Editar - Plataforma</strong> </label>
                        <br> <input value="<?= $plataforma['nome'] ?>" type="text" id="idioma1" name="idioma1"><br>
                        <input value="<?= $id_plataforma ?>" name="id" type="hidden">

                        <br>

                        <?php if ($Error != null) { ?>
                            <div class="error_msg"><?= $Error ?></div>
                        <?php } ?>

                        <br>
                        <div id="button_editar1">
                            <button class="button_editar" type="submit">Atualizar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</body>

</html>