<?php
  session_start();

  // isset verifica si existe una variable o eso creo xd
  if(isset($_SESSION['id'])){
    header('location: controller/redirec.php');
  }

	define('HOMEDIR',__DIR__);
	include 'views/header.php';
  	$page=isset($_GET['page'])?$_GET['page']:'login';
	include 'views/'.$page.'.php';
?>