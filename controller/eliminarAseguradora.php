<?php 

$id = $_POST['id'];

require_once('../model/aseguradora.php');
  	
  	$altaaseguradora = new Aseguradora();

  	$altaaseguradora -> deleteAseguradora($id);

?>