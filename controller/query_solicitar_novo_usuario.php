<?php
/*
	Query para salvar usuário do Portal (Recuperado da migração do Intranet)
	Rafael Eduardo Lima @sudorafa
	Recife, 21 de Setembro de 2016
*/

include("../global/conecta.php");

$nomeusuaruio1 	=	$_POST["nome"];
$datacadastro1 	=	date('Y-m-d');  
$matricula1 	=	$_POST["matricula"];  
$senha1 		=	$_POST["senha"];  
$bloqueio1 		=	"sim";  
$setor1 		=	$_POST["setor"];  
$user1			=	$_POST["user"];
$capa1			=	"informar";
$termo1			=	"informar";

session_start();

$servidor = `uname -a | awk -F" " '{print $2}'`;
$filial1  = trim($servidor);

$consulta = mysql_query("select * from usuariosc where user = '$user1' and filial = '$filial1'");
$linha = mysql_num_rows($consulta);
if($linha == 1)
{
	// o usuário existe;
	echo 
	"<script>window.alert('Usuário Já Existe, Solicitação Não Enviada!')
		window.location.replace('../view/form_solicita_cad_usuario.php');
	</script>";	
}
else
{
	$query = "insert into usuariosc (capa, termo, filial, nomusuario, datacadastro, matricula, user, senha, bloqueio, descsetor) values ('$capa1', '$termo1', '$filial1', '$nomeusuaruio1', '$datacadastro1', '$matricula1', '$user1', '$senha1', '$bloqueio1', '$setor1')";

	if( mysql_query($query))
	{
		echo 
		"<script>window.alert('Solicitação Enviada com Sucesso !')
			window.location.replace('../view/form_solicita_cad_usuario.php');
		</script>";	
		
		//enviar email pro cpd
		// subject
		$subject = 'Cadastro no Intranet';

		// message
		$message = "
			<br> <br> <br> <br> 
			<table border=1 align=center>
			<tr align=center>
				<td align=center>
				<br>
				<font color=#006600 size=+3> Solicitacao de Cadatro no Intranet </font>
				<br> <br> <br>
					&nbsp; &nbsp; O usuario: <font color=#006600 size=+1> $user1  </font> Nome: <font color=#006600 size=+1> $nomeusuaruio1 </font> solicitou cadastro no intranet da filial &nbsp; &nbsp;
				<br>
					&nbsp; &nbsp; &nbsp; Se a informacao for valida, verificar possível desbloqueio no Sistema. &nbsp; &nbsp; &nbsp;
				<br>
					&nbsp; &nbsp; &nbsp; Caso contrario, ignore este email! &nbsp; &nbsp; &nbsp;
				<br> <br> 
				</td>
			</tr>
			</table>
		";
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= "To: CPD $filial1<cpd$filial1@atacadao.com.br>" . "\r\n";
		$headers .= "From: INTRANET" . "\r\n";
		
		// Mail it
		if (mail($to, $subject, $message, $headers)) {
			$msgEmail =  "Foi enviado um email para o CPD !";
		} else {
			$msgEmail =  "Ocorreu um erro durante o envio do email para o CPD atualizar os produtos no sistema. !";
		}
	}
	else
	{
		echo 
		"<script>window.alert('Algo Errado no Query !')
			window.location.replace('../view/form_solicita_cad_usuario.php');
		</script>";	
		
	}
}

?>