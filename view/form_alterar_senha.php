<?php
	/*
		Form Criado para carregar usuário do Portal (Recuperado da migração do Intranet)
		Rafael Eduardo Lima @sudorafa
		Recife, 19 de Setembro de 2016
	*/
	session_start();
    $idusuario  = $_SESSION['idusuario'];
    include("../global/libera.php");
    include("../global/conecta.php");
    
    include("../cabecalho.php");
	include("../menu.php");

    $dados_usuario_logado 	= mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado 	= $dados_usuario_logado['filial'];
	
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
    <body onLoad="document.senha_nova.user.focus()">

    <!---------------------------------------------------------------------------------->
    <script language="javascript">
	function valida_dados (senha_nova)
	{
		if (senha_nova.user.value=="") {
			alert ("Por favor digite o Login !");
			senha_nova.user.focus();
			return false;
		}
		
		if (senha_nova.passwd.value=="") {
			alert ("Por favor digite a Senha Atual !");
			senha_nova.passwd.focus();
			return false;
		}
		
		if (senha_nova.senha_nova1.value=="") {
			alert ("Por favor digite a Senha Nova !");
			senha_nova.senha_nova1.focus();
			return false;
		}
		
		if (senha_nova.senha_nova2.value=="") {
			alert ("Por favor redigite a Senha Nova !");
			senha_nova.senha_nova2.focus();
			return false;
		}
		if (senha_nova.senha_nova2.value!=senha_nova.senha_nova1.value) {
			alert ("Novas Senhas tem que ser iguais !");
			senha_nova.senha_nova2.focus();
			return false;
		}
		
	return true;
	}
	</script>
    <!---------------------------------------------------------------------------------->
		
        <div id="interface">

            <div id="Conteudo">
                <br/>
                <h2 align="center"> <font color="336699"> Alterar Senha </font></h2>  
                <br/>
                <table border="0" align="center">
					<tr>
					<form action="../controller/query_senha_nova.php" name="senha_nova" method="post" onSubmit="return valida_dados(this)">
						<td align="right"> <font color="336699"> Login:
						<td><input type="text" name="user" size="15">
					</tr>
					<tr>
						<td align="right"> <font color="336699"> Senha Atual: &nbsp;
						<td><input type="password" name="passwd" size="15">
					</tr>
					<tr>
						<td align="right"> <font color="336699"> Senha Nova: &nbsp;
						<td><input type="password" name="senha_nova1" size="15">
					</tr>
					<tr>
						<td align="right"> <font color="336699"> Repita Senha Nova: &nbsp;
						<td><input type="password" name="senha_nova2" size="15">
					</tr>
					<tr>
						<td align="center" colspan="2">
						</br>
							<input type="submit"  value="Salvar"> &nbsp;
						</td>
					</form>
					</tr>
				</table>				
                <br/> <br/> <br/><br/><br/>
                <?php 
					include('../rodape.php');
                ?>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>