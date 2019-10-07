<?php
require_once("model/archivos.php");
$obj = new Archivos();
$datos=$obj-> getListUsuarios();
$id= isset($_GET['d'])?$_GET['d']:null;
if($id=='P'){
  if($_SESSION['rolUsuario']==1){
    foreach ($datos as $key ) {
      if(3==$key['rolUsuario']){        
        $nombre=$key['nombreUsuario'];
        $usuario=$key['usuario']
        ?>
        <div class="col-lg-2">

          <div class="panel panel-default">
            <div class="panel-body">
             <a href="master.php?page=documentos/vistaDocumentosAP&d=<?php echo $usuario ?>">
               <input type="image" src="img/folder.png" class="btn btn-link" title="Abrir"> 
             </a>
             <h5 align="center"><?php echo $nombre ?><h5>
             </div>
           </div>
         </div>
         <?php
       }
     }
   }else if($_SESSION['rolUsuario']==2){
    foreach ($datos as $key ) {
      if(3==$key['rolUsuario']){        
        $nombre=$key['nombreUsuario'];
        $usuario=$key['usuario']
        ?>
        <div class="col-lg-2">

          <div class="panel panel-default">
            <div class="panel-body">
              <a href="./admin.php?page=documentos/vistaDocumentosAP&d=<?php echo $usuario ?>">
               <input type="image" src="img/folder.png" class="btn btn-link" title="Abrir"> 
             </a>
             <h5 align="center"><?php echo $nombre ?><h5>
             </div>
           </div>
         </div>
         <?php
       }
     }
   }
 }else if($id=='C'){
  if($_SESSION['rolUsuario']==1){
    foreach ($datos as $key ) {
      if(3==$key['rolUsuario']){        
        $nombre=$key['nombreUsuario'];
        $idUsuario=$key['idUsuario']
        ?>
        <div class="col-lg-2">

          <div class="panel panel-default">
            <div class="panel-body">
             <a href='master.php?page=documentos/vistaCarpetaC&d=<?php echo $idUsuario?>'>
               <input type="image" src="img/folder.png" class="btn btn-link" title="Abrir"> 
             </a>
             <h5 align="center"><?php echo $nombre ?><h5>
             </div>
           </div>
         </div>
         <?php
       }
     }
   }else if($_SESSION['rolUsuario']==2){
    foreach ($datos as $key ) {
      if(3==$key['rolUsuario']){        
        $nombre=$key['nombreUsuario'];
        $idUsuario=$key['idUsuario']
        ?>
        <div class="col-lg-2">

          <div class="panel panel-default">
            <div class="panel-body">
             <a href='./admin.php?page=documentos/vistaCarpetaC&d=<?php echo $idUsuario?>'>
               <input type="image" src="img/folder.png" class="btn btn-link" title="Abrir"> 
             </a>
             <h5 align="center"><?php echo $nombre ?><h5>
             </div>
           </div>
         </div>
         <?php
       }
     }

   }
 }

 ?>
