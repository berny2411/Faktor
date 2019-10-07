<?php 

$id = $_POST['id'];

require_once('../model/aseguradora.php');
  	
  	$altaaseguradora = new Aseguradora();

  	$result=$altaaseguradora -> deleteAseguradora($id);
  	if($result){
  		
  		echo 'Exitoso';
  	} else{
  		echo 'Fallido';
  	}
?>