<?php
session_start();
//$idusuario_ad = $_SESSION["idusuario_ad"];
######################################
//include("ip.php");
include("../global/libera.php");
include("../global/conecta.php");


$user1			= $_POST[user];
$passwd 		= $_POST[passwd];
$senha_nova11	= $_POST[senha_nova1];
$senha_nova21 	= $_POST[senha_nova2];

	$sql = "select * from usuariosc where user = '$user'";
	$sql_2 = mysql_fetch_array(mysql_query($sql));

	if ($sql_2[user] == ""){
		echo 
			"<script>window.alert('Usuario Inexistente !')
				window.location.replace('../view/form_alterar_senha.php');
			</script>";	
	} else{
		if ($sql_2[senha] == "$passwd"){
			$query = "update usuariosc set senha = '$senha_nova11' where user = '$user'";
			if( mysql_query($query)) {
				echo 
				"<script>window.alert('Senha Alterada com Sucesso !');
					window.location.replace('../view/form_alterar_senha.php');
				</script>";	
			} else {
				echo 
				"<script>window.alert('Algo Errado no Query !');
					window.location.replace('../view/form_alterar_senha.php');
				</script>";		
			}
		}
		else{
			echo 
			"<script>window.alert('Senha Atual Incorreta !')
				window.location.replace('../view/form_alterar_senha.php');
			</script>";	
		}
	}
?>

	
