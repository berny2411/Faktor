<?php 
  $id  = $_POST['id'];

  
  $siniestro  = $_POST['sin'];
  $descripcion = $_POST['descripcion'];

  $rol  = $_POST['rol'];
  $honorario  = $_POST['honorario'];
  
 
 
    if(empty($siniestro) || empty($descripcion) || empty($honorario))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{
    require_once('../model/procedimiento.php');
    
    $altacaso = new procedimiento();

    $altacaso -> updateCaso($id,$siniestro ,$descripcion, $rol,$honorario);
  }
?>