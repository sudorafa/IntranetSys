<?php
	/*
		Form Criado para carregar o cabe�alho do Portal
		Rafael Eduardo Lima @sudorafa
		Recife, 07 de Setembro de 2016
	*/
	session_start();
	include('global/conecta.php');
	$perfilAtivo			= $_SESSION['perfil'];
	$idusuario 				= $_SESSION['idusuario'];
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
            <header id="cabecalho">
                <a id="logoHeaderAtacadao" href="/index.php">
                    <image title="Intranet Filial - Atacad�o Recife" alt="Logo Atacad�o." src="/_imagens/logo.png"/>
                </a>
                <section id="textoCabecalho">
                    <h1 align="right">
                        INTRANET NOME EMPRESA
                    </h1>
					<h2 align="right">
                        <script language="JavaScript">
                            days = new Array("Domingo","Segunda-feira","Ter�a-feira","Quarta-feira","Quinta-feira",
                                                "Sexta-feira","S�bado");
                            months = new Array("Janeiro","Fevereiro","Mar�o","Abril","Maio","Junho","Julho",
                                                "Agosto","Setembro","Outubro","Novembro","Dezembro");
                            today = new Date();
                            day = days[today.getDay()];
                            month = months[today.getMonth()];
                            date = today.getDate();
                            year = today.getYear() + 1900;
                            document.write (day + ", " + date + " de " + month + " de " + year);
                        </script>
                    </h2>
					<div align="right">
						<font color="blue" size="-0"> <b>  <br/></font>
					</div>
					<br/>
					<?php
						if($idusuario != "false" && $idusuario != ""){
					?>
						<h2 align="right">
							Bem Vindo(a) <span><?php echo Strtoupper($dados_usuario_logado[nomusuario]) ?></span>
							<?php
								if ($perfilAtivo == "CPD"){ ?>
									<a href="/view/form_config.php"><img src="/_imagens/config.png" border="0" height="30px"></a>
								<?php }
							?>
						</h2>
						<h2 align="right"><a href="/view/form_alterar_senha.php">Mudar Senha</a> | <a href="/global/logout.php"> SAIR </a> </h2>
					<?php 
						}else{
					?>
						<h2 align="right">
							Bem Vindo(a) <br/>
							<a href="/view/form_solicita_cad_usuario.php" title="Solicitar Cadastro"> Cadastre-se </a>
						</h2>
						<?phpinclude('global/logout.php');?>
						<br/>
					<?php
						}
					?>
                </section> <!-- /textoCabecalho -->
                <div id="clear"></div> <!-- /clear -->
            </header>
            
        </div> <!--/interface -->

    </body>
</html>