<?php 

	$nPaciente  = $_POST['nPaciente'];
  $apellidoPat = $_POST['apellidoPat'];
  $apellidoMat  = $_POST['apellidoMat'];
  $hospital  = $_POST['hospital'];
  $cuartoHospital  = $_POST['cuartoHospital'];
  $numPaciente  = $_POST['numPaciente'];
  $email  = $_POST['email'];
 
  	if(empty($nPaciente) || empty($apellidoPat) || empty($apellidoMat))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{
  	require_once('../model/paciente.php');
  	
  	$altaPaciente = new Paciente();

  	$altaPaciente -> addPaciente($nPaciente, $apellidoPat, $apellidoMat, $hospital, $cuartoHospital, $numPaciente, $email);
  }
?>