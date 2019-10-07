<?php 
 
	$idPaciente=$_POST['idPaciente'];
	$nPaciente  = $_POST['nPaciente'];
  $apellidoPat = $_POST['apellidoPat'];
  $apellidoMat  ="";
  $hospital  = $_POST['hospital'];
  $cuartoHospital  = $_POST['cuartoHospital'];
  $numTel  = $_POST['numTel'];
  $emailP  = $_POST['emailP'];
 
		require_once('../model/paciente.php');
		$modPaciente = new Paciente();
		
		$modPaciente -> updatePaciente($idPaciente, $nPaciente, $apellidoPat, $apellidoMat, $hospital, $cuartoHospital, $numTel, $emailP);
			
  	
?>