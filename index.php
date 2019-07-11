<?php
	define('HOMEDIR',__DIR__);
	include 'views/header.php';
	$page=isset($_GET['page'])?$_GET['page']:'tablaAseguradora';

	include 'views/'.$page.'.php';
	include 'views/footer.php';