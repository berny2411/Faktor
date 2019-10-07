<?php
require_once("model/usuario.php");
require_once("model/archivos.php");
$obj = new Usuario();
$arch= new Archivos();
$id=$_SESSION['idUsuario'];
$datos=$obj-> getUserById($id);

if(!empty($datos[0]['apellidoPatUsuario'])&&!empty($datos[0]['apellidoMatUsuario'])&&!empty($datos[0]['direccionUsuario'])&&!empty($datos[0]['numTelefonoUsuario'])){
    if (!empty($datos[0]['numCuenta'])&&!empty($datos[0]['bancoAfiliado'])&&!empty($datos[0]['folioFiscal'])&&!empty($datos[0]['rfc'])){
        $url=$arch->getUserById();
        foreach($url as $key){
            if($key['idDocumentosPersonal']==$_SESSION['usuario']){
                $enlace=substr($key['urlArchivo'], 3);
            }   
        }

        $total_pdf = count(glob($enlace."/{*.pdf}",GLOB_BRACE));
        if ($total_pdf==3){
            $obj->updateInfoC($id,1);
        }else {echo "falta documentos";}




    }else{
        echo "falta informacion bancaria";
    }
}else{echo "falta informacion personal";}


?>