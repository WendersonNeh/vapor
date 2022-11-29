<?php
$titulo_pagina = "Suporte";
$enviado = $_GET['enviado-message'] ?? null;

$sucess_msg = $_GET['success_msg'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="styles.css">
<?php require('./modulos/top-menu.php') ?>

<body>
    <div id="body-container">
        <?php require('./modulos/side-menu.php') ?>
        <div id="content">
            <div id="header">SUPORTE</div>

            <div id="formulario_suporte">

                <form action="suporte_formulario.php" method="post">

                    <label class="suporte_label" for="fname">Nome:*</label><br>
                    <input required type="text" id="fname" name="nome_suporte" class="suporte_input" value=""><br>

                    <label class="suporte_label" for="email_1">E-mail:*</label><br>
                    <input required type="email" id="email_1" name="email_suporte" class="suporte_input" value=""><br>

                    <label class="suporte_label">Mensagem:*<label><br>
                            <textarea required type="text" name="mensagem_suporte" id="msg" cols="30" class="suporte_input1" rows="10"></textarea><br>

                            <label class="suporte_label" for="cars">Selecione o assunto:*</label><br>
                            <select required class="suporte_input" name="assunto_suporte" id="assunto">
                                <option selected disabled value="">Selecione</option>
                                <option value="sugestao">Sugestão</option>
                                <option value="critica">Crítica</option>
                                <option value="elogio">Elogio</option>
                                <option value="duvida">Dúvida</option>
                                <option value="elogio">Suporte</option>
                                <option value="duvida">Outros</option>

                            </select>

                            <input required type="submit" value="Enviar" id="submit">

                </form>


                <?php if ($sucess_msg != null) { ?>
                    <div class="success_msg"><?= $sucess_msg ?></div>
                <?php } ?>

            </div>

        </div>

    </div>
    </div>
    </div>
</body>

</html>