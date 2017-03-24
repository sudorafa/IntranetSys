<?php
/*
	Rafael Eduardo Lima @sudorafa
	Recife, 05 de Janeiro de 2017
*/

	function doBd($data){
		$dataNova = explode("-", $data);
		$retorno = $dataNova[2] . "/" . $dataNova[1] . "/" . $dataNova[0];
		return($retorno);
	}
	
	function proBd($data){
		$dataNova	= str_replace('/','-',$data);
		$dataNova 	= explode("-", $dataNova);
		$retorno 	= $dataNova[2] . "-" . $dataNova[1] . "-" . $dataNova[0];
		return($retorno);
	}
?>
