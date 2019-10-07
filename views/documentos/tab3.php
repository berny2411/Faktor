
<?php
session_start();
require_once("../../model/archivos.php");
$obj = new Archivos();
$datos=$obj-> getListArchivos();
foreach ($datos as $key ) {
  if($_SESSION["usuario"]==$key["idDocumentosPersonal"])          
    $url=$key["urlArchivo"];
}
$filepath = sprintf("%s/",$url);
$carpeta=substr($filepath, 3);
if(is_dir($carpeta)){
  if($dir = opendir($carpeta)){
    while(($archivo = readdir($dir)) !== false){
      if($archivo != "." && $archivo != ".." && $archivo != ".htaccess"){
               ?>
        <tr>
          <td><a href="<?php echo$filepath.$archivo ?>" target="_blank"><img src="img/icopdf.png" ><?php echo $archivo ?></a></td>
          <td>
            <a href="<?php echo$filepath.$archivo ?>" download="<?php echo $archivo ?>">
            <button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
          </a>
          <button class="btn btn-danger" title="Eliminar" id="delete" data-id="<?php echo $filepath.$archivo ?>"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
          
         </td>
       </tr>
       <?php
     }
   }
   closedir($dir);
 }
}

?>

