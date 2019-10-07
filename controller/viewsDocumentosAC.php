<?php
require_once("model/archivos.php");
$obj = new Archivos();
$id= isset($_GET['d'])?$_GET['d']:null;
$datos=$obj-> getCasoMedico($id);
foreach ($datos as $key ) {  
  $url=$key['urlArchivoC'];
}                  

$filepath = sprintf('%s/',$url);
$carpeta=substr($filepath, 3);
if(is_dir($carpeta)){
  if($dir = opendir($carpeta)){
    while(($archivo = readdir($dir)) !== false){
      if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
        $extension=substr($archivo, -3);
        if($extension=='pdf'){
        ?>
        <tr>
          <td>
            <a href="<?php echo$carpeta.$archivo ?>" target="_blank"><img src="img/icopdf.png" ></a><a href="<?php echo $carpeta.$archivo ?>" target="_blank"><?php echo $archivo ?></a>
        </td>
        <td>
          <a href="<?php echo$carpeta.$archivo ?>" download="<?php echo $archivo ?>">
            <button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
          </a>
          <?php if ($_SESSION['rolUsuario']==3){
            ?>
             <button class="btn btn-danger" title="Eliminar" id="delete" data-id="<?php echo $filepath.$archivo ?>"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
             <?php
          } else{
            
          }?>
        </td>
      </tr>
      <?php
    } else if($extension=='xml'){
    ?>
    <tr>
          <td>
            <a href="<?php echo$carpeta.$archivo ?>" target="_blank"><img src="img/icoxml.png" ></a><a href="<?php echo $carpeta.$archivo ?>" target="_blank"><?php echo $archivo ?></a>
        </td>
        <td>
          <a href="<?php echo$carpeta.$archivo ?>" download="<?php echo $archivo ?>">
            <button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
          </a>
          <?php if ($_SESSION['rolUsuario']==3){
            ?>
             <button class="btn btn-danger" title="Eliminar" id="delete" data-id="<?php echo $filepath.$archivo ?>"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
             <?php
          } else {
            
          }
}
  }
  }
  closedir($dir);
}
}


?>
