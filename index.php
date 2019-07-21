<?php
	define('HOMEDIR',__DIR__);
	include 'views/header.php';
  	$page=isset($_GET['page'])?$_GET['page']:'login';
	include 'views/'.$page.'.php';
?>