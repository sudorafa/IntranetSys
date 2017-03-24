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
    <body onLoad="document.UsuariosBuscar.username.focus()">

    <!---------------------------------------------------------------------------------->
    <script language="javascript">
    <!-- chama a função (UsuariosBuscar) -->
    function valida_dados (UsuariosBuscar)
    {
        if (UsuariosBuscar.username.value=="")
        {
            alert ("Por favor digite o usuario para buscar.");
            UsuariosBuscar.username.focus();
            return false;
        }
    return true;
    }
    </script>
    <!---------------------------------------------------------------------------------->
		
        <div id="interface">

            <div id="Conteudo">
                <br/>
                <h2 align="center"> <font color="336699"> Buscar Usuários </font></h2>  
                <br/>
                <table cellpadding="0" border="1" width="100%" align="center">
                <tr>
                    <section id="UsuariosBuscar">
                        <form action="form_usuario.php" method="post" name="UsuariosBuscar" align="center" onSubmit="return valida_dados(this)">
                        <td class="corpo" align="center"> 
							<br/> <br/> <br/>
                            &nbsp; &nbsp; &nbsp;
                            <font color="336699"> Usuario: </label> &nbsp;
                            <input name="username" value="<?php echo $_POST["username"]; ?>" type="text" size="15" maxlength="15" </label> &nbsp; 
                            <input type="submit" name="buscar" value="buscar"> &nbsp; &nbsp; &nbsp;
                        <br/> <br/> <br/> <br/>
						</td>
                        </form>
                    </section >
                    <td/>
                    <form action="form_usuario.php" method="post" name="listar_usuarios" align="center">
                    <td class="corpo" align="center"> 
                        <br/> <br/> <br/>
						<label> <font color="336699">  Usuarios por Setor: </label> &nbsp;
                        <?php
                            $setor= mysql_query("select * from setorc where codsetor <> 10 order by descsetor");
                        ?>
                        <select size="1" name="setor">
							<option value="TODOS"> TODOS </option>
                        <?php
                            while ($setor_1 = mysql_fetch_array($setor)){
                        ?>
                            <option value="<?php echo $setor_1[descsetor]?>"> <?php echo $setor_1[descsetor]?></option>
                        <?php } ?>  
                        </select> &nbsp; &nbsp;
                        <input type="submit" name="listar" value="listar"> &nbsp; &nbsp; &nbsp;
						<br/> <br/> <br/> <br/>
					</td>
                    </form>
                </tr>
                </table>
				<br/>
                <?php 
                    $username   = $_POST['username']; 
                    $consulta = mysql_query("select * from usuariosc where user = '$username' and filial = '$filial_usuario_logado'");
                    $linha = mysql_num_rows($consulta);
                    if(($_POST[username]) or ($_POST[username] <> "") or ($_POST[username] <> 0)){
                        if($linha == 1)
                        {
                            // o usuário existe;
                            include("form_alterar_deletar_usuario.php");
                        }
                        else
                        {
                            // o usuário não existe;
                            echo "<script>window.alert('Usuario nao existe, cadastre e salve !')</script>";
                            include("form_cad_usuario.php");
                        }
                    }else{ ?>
                        <div align="center">
                    		<label> <font color="336699">  Digite o Usuário do Colaborador para Cadastrar ou Alterar ! </label> &nbsp; 
                        </div>
                        <br/> <br/> <br/><br/><br/>
                    <?php }
					
					$setor1	= 	$_POST["setor"];
					if(isset($setor1)){
						include("form_listar_usuario.php");
					}
					
					include('../rodape.php');
                ?>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>