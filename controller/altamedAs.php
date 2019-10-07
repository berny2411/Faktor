<?php 

    $medico = $_POST['selectUs'];
    $nAseguradora= $_POST['selectAs'];
    $usuario = $_POST['userAseguradora'];
    $contraseña = $_POST['passwordAseguradora'];

  	if(empty($medico) || empty($nAseguradora) )
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{
  	require_once('../model/medicoAseg.php');
  	
  	$altamedAseguradora = new medicoAsg();

  	$result=$altamedAseguradora -> addmedAseguradora($medico,$nAseguradora, $usuario, $contraseña);

    if($result){
      echo 'Exitoso';
    }else {

    echo 'Sin Exito';   }
  }

?>