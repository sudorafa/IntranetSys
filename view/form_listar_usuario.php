<?php
	/*
		Form Criado para listar usuários do Portal (Recuperado da migração do Intranet)
		Rafael Eduardo Lima @sudorafa
		Recife, 21 de Setembro de 2016
	*/
	session_start();
	$idusuario = $_SESSION['idusuario'];
	include("../global/libera.php");
    include("../global/conecta.php");
	
	$idusuario 				= $_SESSION['idusuario'];
	$dados_usuario_logado 	= mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado 	= $dados_usuario_logado['filial'];
	
	$setor1					= $_POST["setor"];

	if (($_SESSION['perfil'] != "CPD") && ($_SESSION['perfil'] != "GERENTE")){
		header("Location:/");
	}
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body> 
		<div id="interface">
            <div id="Conteudo">
				<br/>
				<!-- -------------------------------------------------------------------------------------------------------------- -->
				<!-- -------------------------------------------------------------------------------------------------------------- -->
				<!-- ------------------------------------------- LISTANDO POR SETOR ----------------------------------------------- -->
				<!-- -------------------------------------------------------------------------------------------------------------- -->
				<?php 
					$usuariosBusca 			= mysql_query("select * from usuariosc where descsetor = '$setor1' and filial = '$filial_usuario_logado' order by nomusuario");
					$linhasBusca 			= mysql_num_rows($usuariosBusca);
					$uso 					= $linhasBusca;
					
					if ($setor1 != "TODOS") { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						<?php 
							if ($uso == 0) { ?>
							<tr>
								<h2 align="center"> <font color="336699"> Usuários Setor: <?php echo $setor1?> </font></h2> 
								<br/>
							</tr>
							<tr>
								<font> <h3 align="center"> <font color="336699"> NADA PARA EXIBIR ! !</font></h3>
								</br> </br>
							</tr>
							<?php }
							else { ?>
							<tr>
								<h2 align="center"> <font color="336699"> Usuários Setor: <?php echo $setor1?> </font></h2> 
								</br>
							</tr>
							<tr>
								<td class="title" height="26"> MATRICULA </td>
								<td class="title" height="26"> NOME </td>
								<td class="title" height="26"> USUARIO </td>
								<td class="title" height="26"> BLOQUEIO </td>
								<td class="title" height="26"> DATA CADASTRO </td>
								<td class="title" height="26"> CAPINHA </td>
								<td class="title" height="26"> TERMO </td>
							</tr>
							<?php
								while ($dadosUsuariosBusca = mysql_fetch_array($usuariosBusca)){
							?>
							<tr>
								<td class="corpo" height="26" > <?php echo $dadosUsuariosBusca[matricula]?> </td>
								<td class="corpo" height="26" > <?php echo $dadosUsuariosBusca[nomusuario]?></a> </td>
								<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[user])?> </td>					
								<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[bloqueio])?> </td>
								<td class="corpo" height="26" > <?php echo $dadosUsuariosBusca[datacadastro]?> </td>
								<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[capa])?> </td>
								<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[termo])?> </td>
							</tr>
							<?php } };?>
						</table>
						<br/>
					<!-- -------------------------------------------------------------------------------------------------------------- -->
					<!-- -------------------------------------------------------------------------------------------------------------- -->
					<!-- ------------------------------------------- LISTANDO TUDO ---------------------------------------------------- -->
					<!-- -------------------------------------------------------------------------------------------------------------- -->
					<?php } else {
						
						$buscaSetor				= mysql_query("select descsetor from setorc where codsetor < '10'");
						
						while ($dadosBuscaSetor = mysql_fetch_array($buscaSetor)){
							
							$setor1 = $dadosBuscaSetor[descsetor];
							
							$usuariosBusca 			= mysql_query("select * from usuariosc where descsetor = '$setor1' and filial = '$filial_usuario_logado' order by nomusuario");
							$linhasBusca 			= mysql_num_rows($usuariosBusca);
							$uso 					= $linhasBusca;

						?>
							<table cellpadding="0" border="1" width="100%" align="center">
							<?php 
								if ($uso == 0) { ?>
								<tr>
									<h2 align="center"> <font color="336699"> Usuários Setor: <?php echo $setor1?> </font></h2> 
									<br/>
								</tr>
								<tr>
									<font> <h3 align="center"> <font color="336699"> NADA PARA EXIBIR ! !</font></h3>
									</br></br>
								</tr>
								<?php }
								else { ?>
								<tr>
									<h2 align="center"> <font color="336699"> Usuários Setor: <?php echo $setor1?> </font></h2> 
									</br>
								</tr>
								<tr>
									<td class="title" height="26"> MATRICULA </td>
									<td class="title" height="26"> NOME </td>
									<td class="title" height="26"> USUARIO </td>
									<td class="title" height="26"> BLOQUEIO </td>
									<td class="title" height="26"> DATA CADASTRO </td>
									<td class="title" height="26"> CAPINHA </td>
									<td class="title" height="26"> TERMO </td>
								</tr>
								<?php
									while ($dadosUsuariosBusca = mysql_fetch_array($usuariosBusca)){
								?>
								<tr>
									<td class="corpo" height="26" > <?php echo $dadosUsuariosBusca[matricula]?> </td>
									<td class="corpo" height="26" > <?php echo $dadosUsuariosBusca[nomusuario]?></a> </td>
									<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[user])?> </td>					
									<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[bloqueio])?> </td>
									<td class="corpo" height="26" > <?php echo $dadosUsuariosBusca[datacadastro]?> </td>
									<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[capa])?> </td>
									<td class="corpo" height="26" > <?php echo Strtoupper($dadosUsuariosBusca[termo])?> </td>
								</tr>
								<?php } };?>
							</table>
							<br/>
						<?php
							} 
						} ?>
						<!-- -------------------------------------------------------------------------------------------------------------- -->
            </div> <!--/conteudo -->
        </div> <!--/interface -->
    </body>
</html>