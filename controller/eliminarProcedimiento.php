<?php 

$id = $_POST['id'];
$idDc= $_POST['idD'];

function eliminarDir($carpeta)
	{
		foreach(glob($carpeta . "/*") as $archivos_carpeta)
		{
			if (is_dir($archivos_carpeta))
			{
				eliminarDir($archivos_carpeta);
			}
			else
			{
				unlink($archivos_carpeta);
			}
		}
		rmdir($carpeta);
	}
require_once('../model/procedimiento.php');
require_once('../model/archivos.php');

$obj = new procedimiento();
$arch= new Archivos();
$result=$obj->deleteProcedimiento($id);

if(!$result){

$url=$obj -> getdocumentoCasoMedico($idDc);

	$direccion= $url[0]['urlArchivoC'];
	eliminarDir($direccion);

	$arch->deleteArchivosCaso($idDc);

	
	echo 'Exitoso';
} else{
	echo 'Fallido';
}






?>