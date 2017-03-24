<?php
	/*
		Form Criado para editar ou deletar usuário do Portal (Recuperado da migração do Intranet)
		Rafael Eduardo Lima @sudorafa
		Recife, 19 de Setembro de 2016
	*/
	session_start();
    $idusuario  = $_SESSION['idusuario'];
    include("../global/libera.php");
    include("../global/conecta.php");
    
	$tipo1		= $_GET['tipo'];
	
	if ($tipo1 == "lista"){
		$username1	= $_GET['username'];
	} else{
		$username1 	= $username;
	}
	
	if (($_SESSION['perfil'] != "CPD") && ($_SESSION['perfil'] != "GERENTE")){
		header("Location:/");
	}
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <meta charset = "UTF-8"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body onLoad="document.form_home.matricula.focus()"> 
        <!---------------------------------------------------------------------------------->
        <script language="javascript">
        <!-- chama a função (alterar) -->
        function valida_dados_alterar (alterar)
        {
            if (alterar.nomeusuaruio.value=="")
            {
                alert ("Por favor digite o nome do usuario.");
                return false;
            }
                
            /*if (alterar.senha.value=="")
            {
                alert ("Por favor digite a senha do usuario.");
                return false;
            }*/
            
            if (alterar.matricula.value=="")
            {
                alert ("Por favor digite a matricula do usuario.");
                return false;
            }
            
        return true;
        }
        </script>

        <!---------------------------------------------------------------------------------->

        <script language="javascript">
        <!-- chama a função (deletar)-->
        function valida_dados_deletar (deletar)
        {
            if (deletar.matricula1.value=="")
            {
                alert ("Por favor digite o usuario para deletar.");
                return false;
            }

        return true;
        }
        </script>
        <!-- ------------------------------------------------------------------------------------ -->
		<div id="interface">
            <div id="Conteudo">
            <br/>
                <h2 align="center"> <font color="336699"> Alterar / Excluir Usuarios </font> </h2> 
                <table cellpadding="0" border="1" width="100%" align="center">
                <tr>
                <form action="../controller/query_salvar_alteracao_usuario.php" method="post" name="alterar" onSubmit="return valida_dados_alterar(this)">
                <?php 
                    $usuario = mysql_query("select * from usuariosc where user = '$username1' and filial = '$filial_usuario_logado'");
                    $dados_usuario = mysql_fetch_array($usuario)
                ?>
                <tr> 
                    <td align="center">
                    <br/> <br/>
                        <label> <font color="336699"> *Nome: </label> &nbsp;
                        <input name="nomeusuaruio" type="text" size="50" maxlength="50" value="<?php echo $dados_usuario[nomusuario]?>"> &nbsp; &nbsp; &nbsp;
                        
                        <label> <font color="336699">  *Setor: </label> &nbsp;
                        <?php
                            $setor= mysql_query("select * from setorc where codsetor <> 10 order by descsetor");
                        ?>
                        <select size="1" name="setor">
                        <option value="<?php echo $dados_usuario[descsetor]?>"> <?php echo $dados_usuario[descsetor]?></option>
                        <option value="999"> - </option>
                        <?php
                            while ($setor_1 = mysql_fetch_array($setor)){
                        ?>
                            <option value="<?php echo $setor_1[descsetor]?>"> <?php echo $setor_1[descsetor]?></option>
                        <?php }?>   
                        </select> &nbsp; &nbsp;
                        
                        <!--
                        <label> <font color="336699">  *Filial: </label> &nbsp;
                        <?php
                            $busca_filial= mysql_query("select * from filialc"); 
                        ?>
                        <select size="1" name="filial">
                        <option value="<?php echo $dados_usuario[filial]?>"> <?php echo $dados_usuario[filial]?></option>
                        <option value="999" align = "center"> - </option>
                        <?php
                            while ($dados_filial = mysql_fetch_array($busca_filial)){
                        ?>
                            <option value="<?php echo $dados_filial[filial]?>"> <?php echo $dados_filial[filial]?></option>
                        <?php }?>   
                        </select> &nbsp; &nbsp;
                        -->
                        
                    <br/> <br/> <br/>
                    
                        <label> <font color="336699">  Data Desta Atualizacao: </label> &nbsp;
                        <input name="datacadastro" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d') ?>"> &nbsp; &nbsp; 
                        
                        <label> <font color="336699">  Data Ultima Atualizacao: </label> &nbsp;
                        <input name="data_cadastro" type="text" size="10" maxlength="10" readonly="false" value="<?php echo $dados_usuario[datacadastro] ?>"> &nbsp; &nbsp; 
                        
                        <label> <font color="336699"> Capinha: </label> &nbsp;
                        <?php
                        $capa= mysql_query("select * from usuariosc where user = '$username1'");
                        $dados_capa = mysql_fetch_array($capa);
                        ?>
                        <select size="1" name="capa">
                            <option value="<?php echo $dados_capa[capa]?>"> <?php echo $dados_capa[capa]?></option>
                            <option value="----">----</option>
                            <option value="sim">sim</option>
                            <option value="nao">nao</option>
                            <option value="perdeu">perdeu</option>
                            <option value="velha">velha</option>
                        </select> &nbsp; &nbsp;
                        
                        <label> <font color="336699"> Termo: </label> &nbsp;
                        <?php
                        $termo= mysql_query("select * from usuariosc where user = '$username1'");
                        $dados_termo = mysql_fetch_array($termo);
                        ?>
                        <select size="1" name="termo">
                            <option value="<?php echo $dados_termo[termo]?>"> <?php echo $dados_termo[termo]?></option>
                            <option value="----">----</option>
                            <option value="sim">sim</option>
                            <option value="nao">nao</option>
                        </select> &nbsp; &nbsp;
                        
                    <br/> <br/> <br/>
                        <label> <font color="336699">  Senha (controller ao Portal): </label> &nbsp;
                        <input name="senha" type="password" size="25" maxlength="20" value="<?php echo $dados_usuario[senha] ?>"> &nbsp; &nbsp;
                        
                        <label> <font color="336699">  *Bloqueio: </label> &nbsp;
                        <select size="1" name="bloqueio">
                            <option value="<?php echo $dados_usuario[bloqueio]?>"><?php echo $dados_usuario[bloqueio]?></option>
                            <option value="nada">-----</option>
                            <option value="nao">nao</option>
                            <option value="sim">sim</option>
                        </select> &nbsp; &nbsp;
                        
                        <label> <font color="336699">  *Matricula (Bipar o Cracha): </label> &nbsp;
                        <input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $dados_usuario[matricula] ?>"> &nbsp; &nbsp;
                    <br/> <br/> <br/> <br/>
                    

                    <input type="hidden" name="user1" value="<?php echo $dados_usuario[user]?>" >
                    
                    <table cellpadding="0" border="0" width="20%" align="center">
                    <tr align="center">
                        <td align="center"> 
                            <input align="center" type="submit" name="salvar" value="salvar"> 
                        </td>
                        
                </form>
                        <form action="../controller/query_deletar_usuario.php" method="post" name="deletar" align="center" onSubmit="return valida_dados_deletar(this)">
                        <td >
                            <input type="hidden" name="matricula1" value="<?php echo $dados_usuario[matricula]?>" >
                            <input align="center" type="submit" name="deletar" value="deletar">  
                        </td>
                        </form>
                    </tr>
                    </table>
                    <br/> <br/>
            </td>
            
        </tr>
        </table> 
            </div> <!--/conteudo -->
        </div> <!--/interface -->
    </body>
</html>