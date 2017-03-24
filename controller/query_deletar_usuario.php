<?php
/*
	Query para deletar usuário do Portal (Recuperado da migração do Intranet)
	Rafael Eduardo Lima @sudorafa
	Recife, 21 de Setembro de 2016
*/
session_start();
include("../global/conecta.php");

$idusuario = $_SESSION['idusuario'];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado['filial'];

$query = "delete from usuariosc where matricula = '$matricula1' and filial = '$filial_usuario_logado'";

if( mysql_query($query))
{
	echo 
	"<script>window.alert('Deletado com Sucesso !')
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

