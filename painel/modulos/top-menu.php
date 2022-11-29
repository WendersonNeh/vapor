<?php 
    require('./modulos/autenticacao.php');
    require('./modulos/conexao.php');
?>

<div id="top_menu">
    <div id="top_title">
        <h2>Vapor - Painel de Controle</h2>
    </div>

    <div id="top_usuario">
        <h2>Bem-vindo, <?= $administrador['nome'] ?></h2>
    </div>
</div>