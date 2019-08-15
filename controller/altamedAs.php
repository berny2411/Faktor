<?php 

    $medico = $_POST['selectUs'];
    $nAseguradora= $_POST['selectAs'];
    $usuario = $_POST['userAseguradora'];
    $contraseña = $_POST['passwordAseguradora'];

  	if(empty($medico) || empty($nAseguradora) || empty($usuario)||empty($contraseña))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{
  	require_once('../model/medicoAseg.php');
  	
  	$altamedAseguradora = new medicoAsg();

  	$altamedAseguradora -> addmedAseguradora($medico,$nAseguradora, $usuario, $contraseña);
  }

?>