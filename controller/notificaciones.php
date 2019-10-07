
<?php
require_once("model/archivos.php");
require_once("model/usuario.php");
$obj = new Archivos();
$user=new Usuario();
$datos=$obj-> getListArchivos();
$info=$user-> getInforC($_SESSION['idUsuario']);

$nNotf=0;
$Caso=3;
if ($_SESSION['rolUsuario']==3){ 

    foreach ($datos as $key ) {
      if ($_SESSION['usuario']==$key['idDocumentosPersonal']){   
        $fecha=$key['fechaFinal'];
    }
} 
$fecha_actual = strtotime(date("Y-m-d"));
$fecha_entrada = strtotime($fecha);

if($fecha_actual==$fecha_entrada && $info[0]['infoCompleta']==0){
    $nNotf=2;
    $Caso=0;
}
else if ($info[0]['infoCompleta']==0){
    $nNotf=1;
    $Caso=1 ;
}else if ($fecha_actual==$fecha_entrada){
    $nNotf=1;
    $Caso=2;
}
    ?>
<button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-bell">
<span class="count bg-danger"><?php echo $nNotf?></span></i>
<?php
    switch ($Caso) {
        case 0:
        ?><div class="dropdown-menu" aria-labelledby="notification">
                <p class="red"><?php echo "Tienes ".$nNotf." Notificaciones"?></p>
                <a class="dropdown-item media" href="#">
                    <i class="fa fa-check"></i>
                    <p>Actualizar tus documentos</p>
                </a>
                <a class="dropdown-item media" href="#">
                    <i class="fa fa-check"></i>
                    <p>Informacion Personal Incompleta</p>
                </a>

            </div>
        
            <?php
            break;
            case 1:
            ?>
           <div class="dropdown-menu" aria-labelledby="notification">
                <p class="red"><?php echo "Tienes ".$nNotf." Notificaciones"?></p>
                <a class="dropdown-item media" href="#">
                    <i class="fa fa-check"></i>
                    <p>Informacion Personal Incompleta</p>
                </a>

            </div>
            <?php
            break;
            case 2:
            ?>
            <div class="dropdown-menu" aria-labelledby="notification">
                <p class="red">Tienes Notificaciones</p>
                <a class="dropdown-item media" href="#">
                    <i class="fa fa-check"></i>
                    <p>Actualizar tus documentos</p>
                </a>

            </div>
            <?php
            break;
            }
            ?>
            
<?php
}else if($_SESSION['rolUsuario']==1 || $_SESSION['rolUsuario']==2 ){
    ?>
    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>

    </button>
    <?php

} 

?>      


