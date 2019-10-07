<?php 
 
	$id=$_POST['idAseguradora'];
	$nombre  = $_POST['nombre'];
  $paterno = $_POST['apellidoPat'];
  $direccion  = $_POST['direccion'];
  $telefono  = $_POST['telefono'];
 
		require_once('../model/usuario.php');
		$altaaseguradora = new Usuario();
		
		$altaaseguradora ->updateUsuario2($id,$nombre,$paterno,$direccion,$telefono);
			

  	
?>