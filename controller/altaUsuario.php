<?php 

  $usuario  = $_POST['usuario'];
  $password = $_POST['password'];
  $nombre  = $_POST['nombre'];
  $rol= $_POST['rol'];
 
  	if(empty($usuario) || empty($password) || empty($nombre))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{
  	require_once('../model/usuario.php');
  	
  	$altausuario = new Usuario();

  	$altausuario -> addUsuario($usuario, $password, $nombre,$rol);
  }
?>
