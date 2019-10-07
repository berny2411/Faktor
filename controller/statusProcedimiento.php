<?php 
$idC=$_POST['idCS'];
$statusPr  = $_POST['selectStatus'];

  	require_once('../model/procedimiento.php');
  	
  	$statusProc= new procedimiento();

  	$result=$statusProc -> updateStatusProc($idC,$statusPr);

    if ($result){
      echo 'Exitoso';
    }else{
      echo 'Fallido';
    }
    
?>