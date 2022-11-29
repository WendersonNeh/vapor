<?php
require('./modulos/conexao.php');

$id_jogo = $_GET['id'] ?? null;
$Error = $_GET['error_msg'] ?? null;

$categoria_query = "SELECT * FROM categoria ORDER BY nome ASC";
$categorias = mysqli_query($conn, $categoria_query);


$jogos_query = "SELECT * FROM jogo WHERE id = {$id_jogo}";
$jogo = mysqli_fetch_assoc(mysqli_query($conn, $jogos_query));


$sucess_msg = $_GET['success_msg'] ?? null;



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
    <title>Editar - Jogos</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php') ?>

            <div id="sub-container">

                <div id="novos_jogos">

                    <form action="jogos_editar_novo.php" method="post">
                        <div class="ao_lado">

                            <input type="hidden" name="id_jogo" value="<?= $id_jogo ?>">

                            <div class="inputs_jogos full">
                                <label for="name">Nome*</label>
                                <input required name="name" id="name" type="text" value="<?= $jogo['nome'] ?>">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="price">Valor*</label>
                                <input required name="price" id="price" type="number" min="0.00" value="<?= $jogo['valor'] ?>">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="image_url">Imagem*</label>
                                <input required name="image_url" id="image_url" type="url" value="<?= $jogo['imagem_url'] ?>">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="video_url">Video</label>
                                <input name="video_url" id="video_url" type="url" min="0" value="<?= $jogo['video_url'] ?>">
                            </div>

                        </div>

                        <div class="ao_lado">

                            <div class="inputs_jogos full">
                                <label for="release_date">Lançamento*</label>
                                <input required name="release_date" id="release_date" type="date" value="<?= $jogo['data_lancamento'] ?>">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="developer">Desenvolvedora*</label>
                                <input required name="developer" id="developer" type="text" value="<?= $jogo['desenvolvedora'] ?>">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="category">Categoria*</label>
                                <select name="category" id="category" required>
                                    <option value="" disabled selected>Selecione</option>

                                    <?php while ($categoria = mysqli_fetch_array($categorias)) { ?>
                                        <option <?php if ($categoria['id'] == $jogo['id_categoria']) {
                                                    echo 'selected';
                                                } ?> value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>


                        </div>

                        <div class="ao_lado">
                            <div class="input-container full">
                                <label for="description">Descrição*</label>
                                <textarea required name="description" id="description" cols="30" rows="10"><?= $jogo['descricao'] ?></textarea>
                            </div>
                        </div>




                        <?php if ($Error != null) { ?>
                            <div class="error_msg"><?= $Error ?></div>
                        <?php } ?>

                        <?php if ($sucess_msg != null) { ?>
                            <div class="success_msg"><?= $sucess_msg ?></div>
                        <?php } ?>


                        <div id="button_editar2">
                            <button class="button_editar2" type="submit">Salvar</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>