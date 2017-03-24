<?php
/*
	Query para salvar alteração usuário do Portal (Recuperado da migração do Intranet)
	Rafael Eduardo Lima @sudorafa
	Recife, 21 de Setembro de 2016
*/

include("../global/conecta.php");

$nomeusuaruio1	= 	$_POST["nomeusuaruio"];
$datacadastro1	= 	$_POST["datacadastro"];
$matricula1		= 	$_POST["matricula"];
$senha1			= 	$_POST["senha"];
$bloqueio1		= 	$_POST["bloqueio"];
$setor1			= 	$_POST["setor"];
$user			=	$_POST["user1"];
$capa1			=	$_POST["capa"];
$termo1			=	$_POST["termo"];

session_start();

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "update usuariosc set capa = '$capa1', termo = '$termo1', nomusuario = '$nomeusuaruio1', datacadastro = '$datacadastro1',  matricula = '$matricula1',  senha = '$senha1',  bloqueio = '$bloqueio1',  descsetor = '$setor1' where user = '$user' and filial = '$filial_usuario_logado'";

if( mysql_query($query))
{
	echo 
	"<script>window.alert('Salvo com Sucesso !')
		window.location.replace('../view/form_usuario.php');
	</script>";	
}
else
{
	echo 
	"<script>window.alert('Algo Errado no Query !')
		window.location.replace('../view/form_usuario.php');
	</script>";	
}

?>

