<?php
/*
	Query para salvar usuário do Portal (Recuperado da migração do Intranet)
	Rafael Eduardo Lima @sudorafa
	Recife, 21 de Setembro de 2016
*/

include("../global/conecta.php");

$nomeusuaruio1 	=	$_POST["nome"];
$datacadastro1 	=	$_POST["datacadastro"];  
$matricula1 	=	$_POST["matricula"];  
$senha1 		=	$_POST["senha"];  
$bloqueio1 		=	$_POST["bloqueio"];  
$setor1 		=	$_POST["setor"];  
$user1			=	$_POST["user"];
$capa1			=	$_POST["capa"];
$termo1			=	$_POST["termo"];

session_start();

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "insert into usuariosc (capa, termo, filial, nomusuario, datacadastro, matricula, user, senha, bloqueio, descsetor) values ('$capa1', '$termo1', '$filial_usuario_logado', '$nomeusuaruio1', '$datacadastro1', '$matricula1', '$user1', '$senha1', '$bloqueio1', '$setor1')";

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