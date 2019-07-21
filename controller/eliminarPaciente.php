<?php 

$id = $_POST['id'];

require_once('../model/paciente.php');
  	
  	$delPaciente = new Paciente();

  	$delPaciente -> deletePaciente($id);

?>