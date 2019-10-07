<?php
require_once("model/archivos.php");
$obj = new Archivos();
$datos=$obj-> getUserById();
$id= isset($_GET['d'])?$_GET['d']:null;
foreach ($datos as $key ) {
  if ($id==$key['idDocumentosPersonal']){   
    $url=$key['urlArchivo'];
  }
}                  

$filepath = sprintf('%s/',$url);
$carpeta=substr($filepath, 3);;
if(is_dir($carpeta)){
  if($dir = opendir($carpeta)){
    while(($archivo = readdir($dir)) !== false){
      if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
        $extension=substr($archivo, -3);
        if($extension=='pdf'){
        ?>
        <tr>
          <td><a href="<?php echo$filepath.$archivo ?>" target="_blank"><img src="img/icopdf.png" ></a><a href="<?php echo $filepath.$archivo ?>" target="_blank"><?php echo $archivo ?></a></td>
          <td>
            <a href="<?php echo$filepath.$archivo ?>" download="<?php echo $archivo ?>">
            <button class="btn btn-primary" title="Descargar"><span class="fa fa-download fa-lg" style="color:#FFFFFF;"></span></button>
          </a>
         </td>
       </tr>
       <?php
     }
     }
   }
   closedir($dir);
 }
}


?>
