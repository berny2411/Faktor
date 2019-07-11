<?php 
 
	$id=$_POST['idAseguradora'];
	$nAseguradora  = $_POST['nAseguradora'];
  $direccion = $_POST['direccion'];
  $pagina  = $_POST['url'];
 
		require_once('../model/aseguradora.php');
		$altaaseguradora = new Aseguradora();
		
		$altaaseguradora ->updateAseguradora($id, $nAseguradora, $direccion, $pagina);
			

  	
?>