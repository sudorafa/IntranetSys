<?php
	/*
		Form Criado para carregar o menu do Portal
		Rafael Eduardo Lima @sudorafa
		Recife, 07 de Setembro de 2016
	*/
	session_start();
	include('global/conecta.php');
	$perfilAtivo			= $_SESSION["perfil"];
	$idusuario 				= $_SESSION["idusuario"];
	$dados_usuario_logado 	= mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
?>

<html>
    <head>
		<link rel="icon" href="/_imagens/favicon1.png" type="image/x-icon" />
        <title> Intranet Sys - Nome Empresa </title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body> 
		<div id="interface">
			<!-- --------------------------------------------------- -->
			<!-- ----------------- Menu para Todos ----------------- -->
			<!-- --------------------------------------------------- -->
            <section id="menu">
                <ul>
				    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
				</ul>
			</section>
			<!-- ------------------------------------------------------ -->
			<!-- ----------------- Menu para Todos Fim ----------------- -->
			<!-- ----------------- Pedido de Login     ----------------- -->
			<!-- ------------------------------------------------------ -->
			<?php 
			if($_SESSION[libera] <> "ok"){
			?>
			<section id="login" >
				<div align="center">
					<ul>
					<li>
						<form action="/controller/query_login.php" name="login" method="post">
							<label >Usuário:</label>
							<input type="text" name="user" size="20" maxlength="20"/>
							<label>Senha:</label>
							<input type="password" name="passwd" size="20" maxlength="20"/>
							<input type="submit"  value=" Entrar "/>
						</form>					
					</li>
					</ul>
				</div>
            </section>
			<!-- -------------------------------------------------------------------------------- -->
			<!-- ------------------------- Pedido de Login Fim           ------------------------ -->
			<!-- ------------------------- Barra de Menu para Perfis     ------------------------ -->
			<!-- -------------------------------------------------------------------------------- -->
			<?php
			} elseif($perfilAtivo == "CPD"){
			?>
			<section id="menuLogado2">
                <ul>
				    <li><a href="/index.php" title="Inicio">INTRANET</a></li>
						<!--<li><a> | </a></li>
                    <li><a href="/compras/home.php" title="Compras">COMPRAS</a></li>-->
						<li><a> | </a></li>
                    <li><a href="/controlc/home.php" title="Controle de Coletores">CONTROL C</a></li>
						<li><a> | </a></li>
                    <li><a href="/etiquetas/home.php" title="Etiquetas Identificadoras ">ETIQUETAS</a></li>
						<li><a> | </a></li>
                    <li><a href="/recargass/home.php" title="Estatisticas Recargas">RECARGAS</a></li>
						<li><a> | </a></li>
                    <li><a href="/sacolas/home.php" title="Controle de Sacolas ">SACOLAS</a></li>
						<li><a> | </a></li>
                    <li><a href="/confinado/home.php" title="Sistema do Confinado">CONFINADO</a></li>
						<li><a> | </a></li>
                    <li><a href="/agenda.descarregos/home.php" title="Agendamento de Descarrego">AGENDAMENTO DESCARREGO</a></li>
						<li><a> | </a></li>
                    <li><a href="/monitor/index.php" target="_blank" title="Monitoramento">MONITORAMENTO</a></li>
						<li><a> | </a></li>
                    <li><a href="/hosts/home.php" title="Monitoramento dos Hosts">HOSTS</a></li>
				    	<li><a> | </a></li>
                    <li><a href="/relatorios" title="Relatórios">RELATÓRIOS</a></li>
						<li><a> | </a></li>
                    <li><a href="/view/form_usuario.php" title="Gerenciamento de Usuário">USUÁRIO</a></li>
				</ul>
			</section>
			<?php
			} 
			?>
			<!-- -------------------------------------------------------------------- -->
			<!-- ----------------- Barra de Menu para Perfil Fim ---------------- -->
			<!-- -------------------------------------------------------------------- -->            
        </div> <!--/interface -->

    </body>
</html>