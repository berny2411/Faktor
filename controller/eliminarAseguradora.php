<?php 
 if(isset($_GET['delete']))
	{
		require_once('../model/aseguradora.php');
		$altaaseguradora = new Aseguradora();

		if($altaaseguradora ->deleteAseguradora($_GET['id']){
			// header('location: ../index.php?page=users&success=true');
			echo json_encode(["success"=>true]);
		}else{
			// header('location: ../index.php?page=users&&error=true');
			echo json_encode(["error"=>true]);
		}
	}
 	
?>