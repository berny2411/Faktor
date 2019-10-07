<?php
require_once("model/archivos.php");
$obj = new Usuario();
$obj2 = new Archivos();
$datos=$obj2-> getUserById();
$correo= $_SESSION['usuario'];
foreach ($datos as $key ) {
  if ($correo==$key['idDocumentosPersonal']){   
    $url=$key['urlArchivo'];
  }
} 
$urlF="images/admin.jpg";   
$filepath = sprintf('%s/',$url);
$carpeta=substr($filepath, 3);;
if(is_dir($carpeta)){
  if($dir = opendir($carpeta)){
    $urlF="images/admin.jpg"; 
    while(($archivo = readdir($dir)) !== false){
      if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
        $extension=substr($archivo, -3);
        if($extension=='jpg'){
          $urlF=$carpeta.$archivo;
        } else{
         
        }
        
      }
    }
    ?>
    <img class="rounded-circle" width="40" height="40" src="<?php echo  $urlF;?>" alt="User Avatar">
    <?php
    closedir($dir);
  }
  
}
?>
