<?php 

	$nAseguradora  = $_POST['nAseguradora'];
  $direccion = $_POST['direccion'];
  $pagina  = $_POST['url'];
 
  	if(empty($nAseguradora) || empty($direccion) || empty($pagina))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{
  	require_once('../model/aseguradora.php');
  	
  	$altaaseguradora = new Aseguradora();

  	$result=$altaaseguradora -> addAseguradora($nAseguradora, $direccion, $pagina);

    if ($result){
      echo 'Exitoso';
    }else{
      echo 'Fallido';
    }
  }
?>