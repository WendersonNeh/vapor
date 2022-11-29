<?php
require('./modulos/conexao.php');

$Error = $_GET['error_msg'] ?? null;

$categoria_query = "SELECT * FROM categoria ORDER BY nome ASC";
$categorias = mysqli_query($conn, $categoria_query);

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
    <title>Novos - Jogos</title>
</head>

<body>

    <div id="dash_container">

        <?php require('./modulos/side-menu.php') ?>

        <div id="sub-dash">
            <?php require('./modulos/top-menu.php') ?>

            <div id="sub-container">

                <div id="novos_jogos">

                    <form action="jogos_cadastrar_novo.php" method="post">
                        <div class="ao_lado">

                            <div class="inputs_jogos full">
                                <label for="name">Nome*</label>
                                <input required name="name" id="name"  type="text">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="price">Valor*</label>
                                <input required name="price" id="price"  type="number" min="0.00">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="image_url">Imagem*</label>
                                <input required name="image_url" id="image_url"  type="url">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="video_url">Video</label>
                                <input name="video_url" id="video_url"  type="url" min="0">
                            </div>

                        </div>

                        <div class="ao_lado">

                            <div class="inputs_jogos full">
                                <label for="release_date">Lançamento*</label>
                                <input required name="release_date" id="release_date"  type="date">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="developer">Desenvolvedora*</label>
                                <input required name="developer" id="developer"  type="text">
                            </div>

                            <div class="inputs_jogos full">
                                <label for="category">Categoria*</label>
                                <select name="category" id="category" required>
                                    <option value="" disabled selected>Selecione</option>

                                    <?php while ($categoria = mysqli_fetch_array($categorias)) { ?>
                                        <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>


                        </div>

                        <div class="ao_lado">
                            <div class="input-jogos full">
                                <label for="description">Descrição*</label>
                                <textarea required name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>




                        <?php if ($Error != null) { ?>
                            <div class="error_msg"><?= $Error ?></div>
                        <?php } ?>

                        <div id="button_editar2">
                            <button class="button_editar2" type="submit">Salvar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>