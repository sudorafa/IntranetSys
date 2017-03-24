<?php
	/*
		Form Criado para mostrar corpo do index
		Rafael Eduardo Lima @sudorafa
		Recife, 15 de Outubro de 2016
	*/
	session_start();	
	
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <!--<link type="text/css" rel="stylesheet" href="/_css/style.css"/>-->
        <meta http-equiv="X-UA-Compatible" content="IE=11"/>
		<style>
			<link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		</style>
    </head>
    <body onLoad="document.login.user.focus()"> 
		<div id="interface">
			<div id="conteudo">
				<br/>
				<div id="principal">
					<!-- *********************************************** BARRA LATERAL DIREITA *********************************************** -->
					<div id="barra-lateral-direita">
						<div id="espacamento" align="center">
							
							
							
						</div>
					</div>
					<!-- *********************************************** BARRA LATERAL DIREITA FIM ******************************************* -->
					
					<!-- *********************************************** BARRA LATERAL ESQUERDA *********************************************** -->
					<div id="barra-lateral-esquerda">
						<div id="espacamento" align="center">
							
							
							
						</div>
					</div>
					<!-- *********************************************** BARRA LATERAL ESQUERDA FIM******************************************** -->
					
					<!-- *********************************************** MEIO ONDE COLOCAR ARTIGOS ******************************************** -->
					<div id="artigos" align="center">
						
						
						
					</div>
					<!-- *********************************************** MEIO ONDE COLOCAR ARTIGOS FIM***************************************** -->
				</div>
				
				<?php
					include('rodape.php');
				?>
			</div>
		</div>
	</body>
</html>