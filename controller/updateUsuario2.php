<?php 
 
	$id=$_POST['idAseguradora'];
	$numCuenta  = $_POST['numCuenta'];
  $bancoAfiliado = $_POST['bancoAfiliado'];
  $folioFiscal  = $_POST['folioFiscal'];
  $rfc  = $_POST['rfc'];
 
		require_once('../model/usuario.php');
		$altaaseguradora = new Usuario();
		
		$altaaseguradora ->updateUsuarioB2('18',$numCuenta, $bancoAfiliado, $folioFiscal ,$rfc);
			

  	
?>