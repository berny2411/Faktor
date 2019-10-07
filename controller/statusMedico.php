<?php 
session_start();
$id=$_SESSION['idUsuario'];
$status  = $_POST['statusN'];
require_once('../model/usuario.php');
require_once("../model/archivos.php");
$arch= new Archivos();
$statusM = new Usuario();
$datos=$statusM-> getUserById($id);

if(!empty($datos[0]['apellidoPatUsuario'])&&!empty($datos[0]['apellidoMatUsuario'])&&!empty($datos[0]['direccionUsuario'])&&!empty($datos[0]['numTelefonoUsuario'])){
	if (!empty($datos[0]['numCuenta'])&&!empty($datos[0]['bancoAfiliado'])&&!empty($datos[0]['rfc'])){
		$url=$arch->getUserById();
		foreach($url as $key){
			if($key['idDocumentosPersonal']==$_SESSION['usuario']){
				$enlace=$key['urlArchivo'];
			}   
		}

		$total_pdf = count(glob($enlace."/{*.pdf}",GLOB_BRACE));
		if ($total_pdf==3){
			$result=$statusM -> updateStatusMed($id,$status,1);
			if ($result){
				echo 'Exitoso';
			}else{
				echo 'Fallido';
			}
		}else {
			$statusM -> updateStatusMed($id,$status,0);
		}




	}else{
		$statusM -> updateStatusMed($id,$status,0);
	}
}else{

$statusM -> updateStatusMed($id,$status,0);
}

?>







