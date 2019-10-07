<?php
require_once("model/archivos.php");
$obj = new Archivos();
$id= isset($_GET['d'])?$_GET['d']:null;
if($_SESSION['rolUsuario']==1){
$datos=$obj-> getUserByCaso($id);
$num=1;
foreach ($datos as $key ) {  
    $idCaso=$key['documentosCasoMedico_iddocumentosCasoMedico'];
?>
  <div class="col-lg-2">

  <div class="panel panel-default">
  <div class="panel-body">
   <a href="master.php?page=documentos/vistaDocumentosAC&d=<?php echo $idCaso ?>&dd=<?php echo $id?>">
             <input type="image" src="img/folder.png" class="btn btn-link" title="Abrir"> 
  </a>
  <h5 align="center"><?php echo "CasoMedico_".$num; ?><h5>
  </div>
  </div>
  </div>

<?php
$num=$num+1;
}
}else if($_SESSION['rolUsuario']==2){

$datos=$obj-> getUserByCaso($id);
$num=1;
foreach ($datos as $key ) {  
    $idCaso=$key['documentosCasoMedico_iddocumentosCasoMedico'];
?>
  <div class="col-lg-2">

  <div class="panel panel-default">
  <div class="panel-body">
   <a href="admin.php?page=documentos/vistaDocumentosAC&d=<?php echo $idCaso ?>&dd=<?php echo $id?>">
             <input type="image" src="img/folder.png" class="btn btn-link" title="Abrir"> 
  </a>
  <h5 align="center"><?php echo "CasoMedico_".$num; ?><h5>
  </div>
  </div>
  </div>

<?php
$num=$num+1;

}
} else{
  $datos=$obj-> getUserByCaso($_SESSION['idUsuario']);
$num=1;
foreach ($datos as $key ) {  
    $idDCaso=$key['documentosCasoMedico_iddocumentosCasoMedico'];
?>
  <div class="col-lg-2">

  <div class="panel panel-default">
  <div class="panel-body">
   <a href="medico.php?page=documentos/vistaDocumentosAC&d=<?php echo $idDCaso ?>">
             <input type="image" src="img/folder.png" class="btn btn-link" title="Abrir" > 
  </a>
  <h5 align="center"><?php echo "CasoMedico_".$num; ?><h5>
  </div>
  </div>
  </div>

<?php
$num=$num+1;
}

}


?>
