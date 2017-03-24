<?php
	/*
		Form Criado para criar usuário do Portal (Recuperado da migração do Intranet)
		Rafael Eduardo Lima @sudorafa
		Recife, 19 de Setembro de 2016
	*/
	session_start();
    $idusuario  = $_SESSION['idusuario'];
    //include("../global/libera.php");
    include("../global/conecta.php");
    
	include("../cabecalho.php");
	include("../menu.php");
	
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <meta charset = "UTF-8"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body onLoad="document.cadastro.nome.focus()"> 
        <!---------------------------------------------------------------------------------->
        <script language="javascript">
        <!-- chama a função (cadastro) -->
        function valida_dados (cadastro)
        {
            if (cadastro.nome.value=="")
            {
                alert ("Por favor digite o nome do usuarios.");
				cadastro.nome.focus();
                return false;
            }
            
            if (cadastro.setor.selectedIndex ==0)
            {
                alert ("Por favor selecione o setor.");
				cadastro.setor.focus();
                return false;
            }
            
            if (cadastro.user.value=="")
            {
                alert ("Por favor digite o usuario.");
				cadastro.user.focus();
                return false;
            }

            if (cadastro.senha.value=="")
            {
                alert ("Por favor digite a senha.");
				cadastro.senha.focus();
                return false;
            }

            if (cadastro.matricula.value=="")
            {
                alert ("Por favor digite a matricula.");
				cadastro.matricula.focus();
                return false;
            }
            
        return true;
        }
        </script>
        <!---------------------------------------------------------------------------------->
		<div id="interface">
            <div id="Conteudo">
            <br/>
                <h2 align="center"> <font color="336699"> Solicitar Cadastro Usuário </font></h2>   
				<h5 align="center"> <font color="336699"> Após envio, será avaliada a solicitação para possível ativação do usuário. </font></h5>   
                <table cellpadding="0" border="1" width="100%" align="center">
                <tr>
                <form action="../controller/query_solicitar_novo_usuario.php" method="post" name="cadastro" onSubmit="return valida_dados(this)">
                    
                    <tr> 
                        <td align="center">
                        <br/> <br/>
                            <label> <font color="336699"> *Nome: </label> &nbsp;
                            <input name="nome" type="text" size="50" maxlength="50" > &nbsp; &nbsp; &nbsp;
                            
                            <label> <font color="336699">  *Setor: </label> &nbsp;
                            <?php
                                $setor= mysql_query("select * from setorc where codsetor <> 10 order by descsetor");
                            ?>
                            <select size="1" name="setor">
                            <option value="0"> - </option>
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
                            <option value="999" align = "center"> - </option>
                            <?php
                                while ($dados_filial = mysql_fetch_array($busca_filial)){
                            ?>
                                <option value="<?php echo $dados_filial[filial]?>"> <?php echo $dados_filial[filial]?></option>
                            <?php }?>   
                            </select> &nbsp; &nbsp;
                            -->
                            
                        <br/> <br/> <br/>
                            <label> <font color="336699"> *Usuário (Save): </label> &nbsp;
                            <label> <input name="user" type="text" size="20" maxlength="15" </label> &nbsp; &nbsp;
                            
                            <label> <font color="336699">  *Data Solicitação: </label> &nbsp;
                            <input name="datacadastro" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('d/m/Y') ?>"> &nbsp; &nbsp; 
                            
                        <br/> <br/> <br/>
                            <label> <font color="336699">  *Senha: </label> &nbsp;
                            <input name="senha" type="password" size="25" maxlength="20" > &nbsp; &nbsp;
                            
                            <label> <font color="336699">  *Matricula: </label> &nbsp;
                            <input name="matricula" type="text" size="15" maxlength="10" > &nbsp; &nbsp;
                        <br/> <br/> <br/> <br/>
                        
                        <table cellpadding="0" border="0" width="20%" align="center">
                        <tr align="center">
                            <td align="center"> 
                                <input align="center" type="submit" name="salvar" value="enviar"> 
                            </td>
                </form>
                        </tr>
                        </table>
                        <br/> <br/>
                </td>
                </tr>
            </table> 
			<?php 		
				include('../rodape.php');
            ?>
			</div> <!--/conteudo -->
        </div> <!--/interface -->
    </body>
</html>