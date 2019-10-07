<?php  
session_start();
$revision=$_POST['status'];
require_once('../model/procedimiento.php');
require_once("../model/archivos.php");
$validar= new procedimiento();
$arch= new Archivos();
$caso =$validar->verificacionCaso();
$idC=$caso[0]['idCasoMedico'];
if(!empty($caso[0]['siniestro'])&&!empty($caso[0]['descripcion'])&&!empty($caso[0]['rolMedicoEnCaso'])&&!empty($caso[0]['honorariosMedico'])){
	if (!empty($caso[0]['Paciente_idPaciente'])&&!empty($caso[0]['Aseguradora_idAseguradora'])){
		$url=$arch->getCasoMedico($caso[0]['documentosCasoMedico_iddocumentosCasoMedico']);
		$enlace=$url[0]['urlArchivoC'];

		$urlPaciente=$validar->getUserByPaciente($caso[0]['Paciente_idPaciente']);
		$enlaceP=$urlPaciente[0]['urlPaciente'];

		$total_pdfP = count(glob($enlaceP."/{*.pdf}",GLOB_BRACE));

		$total_pdf = count(glob($enlace."/{*.pdf,*.xml}",GLOB_BRACE));
		if ($total_pdf==3&&$total_pdfP==1){
			$result=$validar -> updateStatusProc($idC,$revision);

			if ($result){
				echo 'Exitoso';
			}else{
				echo 'Fallido';
			}
		}else {
			
			$resultD=$validar -> updateStatusProc($idC,4);
			if ($resultD){
				echo 'Exitoso. Pero te faltan documentos el status asignado es incompleto';
			}else{
				echo 'Fallido';
			}
		}




	}else{
		
		$validar -> updateStatusProc($idC,4);
	}
}else{
	
	$resultC=$validar -> updateStatusProc($idC,4);
	if ($resultC){
				echo 'Exitoso. Pero te faltan datos del caso';
			}else{
				echo 'Fallido';
			}
}






?>