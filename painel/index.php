<?php
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
    <title>Vapor - Autenticação</title>
</head>

<body>
    <div id="cont_principal">

        <form action="login.php" id=for_login method="post">

            <img src="public/icons/logo.png" alt="login_image" id="imgs_loguin">
            <div class="campo_login">
                <img src="public/icons/email.png" alt="email" class="imgs_loguin">
                <input type="email" placeholder="E-mail" name="email_login" class="input_logins" required>
            </div>
            <div class="campo_login">
                <img src="public/icons/cadeado.png" alt="lock" class="imgs_loguin">
                <input type="password" name="password_login" class="input_logins" placeholder="Password" required>
            </div>
            <button type="submit" id="bnt_login">Login</button>
            <?php if ($Error != null) { ?>
                <label id="error_msg"><?= $Error ?></label>
            <?php } ?>

        </form>
    </div>
</body>

</html>