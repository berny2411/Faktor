<?php


  // Se prendio esta mrd :v
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] != 2){

    
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: index.php');

  }

	define('HOMEDIR',__DIR__);
	include 'views/header.php';
  	include 'views/menuAdmin.php';
	$page=isset($_GET['page'])?$_GET['page']:'principal';

	include 'views/'.$page.'.php';
	include 'views/footer.php';
?>