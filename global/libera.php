<?php
session_start();

if ($_SESSION['libera'] <> "ok"){
		header("Location:/index.php");
		$_SESSION['libera'] 	= "false";
		$_SESSION['perfil']		= "false";
		$_SESSION['idusuario'] 	= "false";
	}
?>