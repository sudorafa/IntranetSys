<?php
	session_start();
	/*
	Form . do sistema
	Rafael Eduardo Lima @sudorafa
	Recife, 30 de Setembro de 2016
	*/
	include('../global/conecta.php');
	include('../global/libera.php');
	include('../cabecalho.php');
	//include("/controller/ip.php");
	//include('../menu.php');
	
	$servidor = `uname -a | awk -F" " '{print $2}'`;
	$servidor  = trim($servidor);
	
	$idusuario = $_SESSION['idusuario'];
	
	$data = date('d')-1 . date('-m-y');
	
	if ($_SESSION['perfil'] != "CPD"){
		header("Location:/cone");	
	}
	
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>		
	</head>
	<body> 
		<?php include('../menu.php'); ?>
			
		<div id="interface">
			<div id="Conteudo">
				<div align="center">
					<br/>
					
				</div>
				<br/><br/><br/><br/>
				<?php include('../rodape.php'); ?>
			</div> <!--/conteudo -->
        </div> <!--/interface -->
		
    </body>
</html>