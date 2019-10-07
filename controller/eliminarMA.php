<?php 

$idA = $_POST['id'];
$idU=$_POST['idUs'];

require_once('../model/medicoAseg.php');
  	
  	$del = new medicoAsg();
  	$validar=$del-> validarDA($idA);
  	if($validar==1){
  		echo 'No se pudo eliminar aseguradora esta siendo usada por un caso medico';
  	} else if($validar==2) {
  		$result=$del-> deleteMA($idA,$idU);
  	if($result){
  		
  		echo 'Exitoso';
  	} else{
  		echo 'Fallido';
  	}
  	}
  	
?>