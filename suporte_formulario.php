<?php 
    $enviado = $_GET['enviado'] ?? null;

require('./modulos/conexao.php');

$nome_suporte = $_POST['nome_suporte'] ?? null;
$email_suporte = $_POST['email_suporte'] ?? null;
$mensagem_suporte = $_POST['mensagem_suporte'] ?? null;
$assunto_suporte = $_POST['assunto_suporte'] ?? null;


$source_suporte = "INSERT INTO suporte (nome,email,assunto,mensagem) VALUES ('{$nome_suporte}','{$email_suporte}','{$assunto_suporte}','{$mensagem_suporte}')";

$source_arquivar = "INSERT INTO arquivos (nome,email,assunto,mensagem) VALUES ('{$nome_suporte}','{$email_suporte}','{$assunto_suporte}','{$mensagem_suporte}')";


mysqli_query($conn, $source_suporte);
mysqli_query($conn, $source_arquivar);



if ( $source_suporte != null) {
   header('location: suporte.php?success_msg=Sua mensagem foi enviada com sucesso');
}

?>