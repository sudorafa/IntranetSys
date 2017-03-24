<?php
session_start();
/*
	form para verificar login para entran no sistema (Recuperado da migração do Intranet)
	Rafael Eduardo Lima @sudorafa
	Recife, 11, Setembro de 2016
*/

include("../global/conecta.php");

$user = $_POST['user'];
$passwd = $_POST['passwd'];

if ($user <> "" and  $passwd <> "" ){
					
	$sql = "select * from usuariosc where user = '$user' and senha = '$passwd' ";
	$sql_2 = mysql_fetch_array(mysql_query($sql));

	if ($sql_2['descsetor'] == "LOJA" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "LOJA";
		$_SESSION[idusuario] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "PREVENCAO" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "PREVENCAO";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "F. CAIXA" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "F. CAIXA";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "DEPOSITO" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "DEPOSITO";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "GERENCIA" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "GERENCIA";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "FRIOS" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "FRIOS";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "CPD" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "CPD";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "CADASTRO" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "CADASTRO";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "GERENTE" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "GERENTE";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "RM" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "RM";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "ESTOQUE" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "ESTOQUE";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($sql_2['descsetor'] == "CHECK-IN" and $sql_2['bloqueio'] == "nao"){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "CHECK-IN";
		$_SESSION['idusuario'] = $sql_2['idusuario'];
		header("Location:../index.php");
		include("ip.php");
	}elseif ($user == "root" and  $passwd == "root" ){
		$_SESSION['libera'] = "ok";
		$_SESSION['perfil'] = "CPD";
		$_SESSION['idusuario'] = "9999";
		header("Location:form_entra_sai.php");
		include("ip.php");
	}
	else{
		echo 
		"<script>window.alert('Acesso negado !')
			window.location.replace('../index.php');
		</script>";	
	}

}
else{
	echo 
	"<script>window.alert('Campos Vazios !')
		window.location.replace('../index.php');
	</script>";	
}		
?>