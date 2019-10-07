<?php
require_once('conexion.php');


class Usuario extends Conexion {

	public function addUsuario($correo, $password, $nombre,$paterno,$materno, $rol){

		parent::conectar(); 
    $nom = sprintf('%s_%s',$correo, $nombre);
    $carpeta = '../files';
    $carpeta2="../files/$nom";
    $carpeta3=$carpeta2.'/Caso_Medico';
    $carpeta4=$carpeta2.'/Paciente';
    $filepath=$carpeta2.'/Documentos_Personal';

    if (!file_exists($carpeta)) {
     mkdir($carpeta, 0777, true);
     mkdir($carpeta2,0777,true);
     mkdir($carpeta3,0777,true);
     mkdir($carpeta4,0777,true);
     mkdir($filepath,0777,true);
   }else{

     mkdir($carpeta2,0777,true);
     mkdir($carpeta3,0777,true);
     mkdir($carpeta4,0777,true);
     mkdir($filepath,0777,true);

   }

   parent::query('insert into DocumentosPersonal(idDocumentosPersonal,urlArchivo,fechaCreacion,fechaFinal) values("'.$correo.'","'.$filepath.'","'.date("Y-m-d ").'","'.date("Y-m-d ").'")');

   $result=parent::query('insert into Usuario(usuario, passwordUsuario, nombreUsuario,apellidoPatUsuario, apellidoMatUsuario,status,infoCompleta,rolUsuario,DocumentosPersonal_idDocumentosPersonal) values("'.$correo.'",MD5("'.$password.'") ,"'.$nombre.'","'.$paterno.'","'.$materno.'",0,0, "'.$rol.'","'.$correo.'" )');
   return $result;

   parent::cerrar();

 }

 public  function getListUsuario(){
  parent::conectar();
  $sql="SELECT * from Usuario";
  $datos=parent::consultaArreglo($sql);
  return $datos;
  parent::cerrar();
}

public function getUserById($id=NULL){
  parent::conectar();
  if(!empty($id)){
   $query  ="SELECT * FROM Usuario WHERE idUsuario=".$id;
   $result =parent::consultaArreglo($query);
   return $result;
 }else{
   return false;
 }
 parent::cerrar();
}

public function getInforC($id=NULL){
  parent::conectar();
  if(!empty($id)){
    $query  ="SELECT infoCompleta FROM Usuario WHERE idUsuario=".$id;
    $result =parent::consultaArreglo($query);
    return $result;
  }else{
    return false;
  }
  parent::cerrar();
}

public function getUserByRol($rol=NULL){
  parent::conectar();
  if(!empty($rol)){
   $query  ="SELECT * FROM Usuario WHERE rolUsuario=".$rol;
   $result =parent::consultaArreglo($query);
   return $result;
 }else{
   return false;
 }
 parent::cerrar();
}


public function updateUsuario($paterno,$materno,$direccion,$telefono,$RFC){
  parent::conectar();
  session_start();
  $id=$_SESSION['idUsuario'];
        //$aseguradora = parent::filtrar($aseguradora);
        //$direccion = parent::filtrar($direccion);


  $result=parent::query("UPDATE Usuario SET apellidoPatUsuario='$paterno', apellidoMatUsuario='$materno', direccionUsuario ='$direccion',numTelefonoUsuario ='$telefono',rfc ='$RFC'WHERE idUsuario=$id");
  return $result;
  parent::cerrar();

}

public function updateUsuarioB($numCuenta, $bancoAfiliado){
  parent::conectar();
  session_start();
  $id=$_SESSION['idUsuario'];
        //$aseguradora = parent::filtrar($aseguradora);
        //$direccion = parent::filtrar($direccion);


  $result=parent::query("UPDATE Usuario SET   numCuenta ='$numCuenta',  bancoAfiliado ='$bancoAfiliado' WHERE idUsuario= $id");
  return $result;
  parent::cerrar();

}


public function updateUsuario2($id,$nombre,$paterno,$direccion,$telefono){
 parent::conectar();
 session_start();
            //$id=$_SESSION['idUsuario'];
        //$aseguradora = parent::filtrar($aseguradora);
        //$direccion = parent::filtrar($direccion);


 parent::query("UPDATE Usuario SET nombreUsuario='$nombre',apellidoPatUsuario='$paterno', direccionUsuario ='$direccion',numTelefonoUsuario ='$telefono' WHERE idUsuario= $id");
 echo "Registrado";
 parent::cerrar();


}

public function updateUsuarioB2($id,$numCuenta, $bancoAfiliado, $folioFiscal ,$rfc){
 parent::conectar();
 session_start();
 $id="18";
        //$aseguradora = parent::filtrar($aseguradora);
        //$direccion = parent::filtrar($direccion);


 parent::query("UPDATE Usuario SET   numCuenta ='$numCuenta',  bancoAfiliado ='$bancoAfiliado', folioFiscal ='$folioFiscal', rfc ='$rfc' WHERE idUsuario= '$id'");
 echo "Registrado";
 parent::cerrar();


}

public function updateInfoC($id,$valor){
 parent::conectar();

 parent::query("UPDATE Usuario SET   infoCompleta ='$valor' WHERE idUsuario= '$id'");

 parent::cerrar();


}

public function updateStatusMed($id,$valor,$infoC){
 parent::conectar();

 return parent::query("UPDATE Usuario SET   status ='$valor', infoCompleta='$infoC' WHERE idUsuario='$id'");

 parent::cerrar();

}


public function deleteUsuario($id=NULL){
  parent::conectar();

  parent::query("DELETE FROM Usuario WHERE idUsuario='$id'");


  parent::cerrar();
}

public function login($user, $clave) {

  parent::conectar();

  $user  = parent::salvar($user);
  $clave = parent::salvar($clave);

  $consulta = 'select idUsuario, usuario, nombreUsuario,status,infoCompleta, rolUsuario from Usuario where usuario="'.$user.'" and passwordUsuario= MD5("'.$clave.'")';
  $verificar_usuario = parent::verificarRegistros($consulta);

  if($verificar_usuario > 0){

    $user = parent::consultaArregloLogin($consulta);

    session_start();

    $_SESSION['idUsuario']     = $user['idUsuario'];
    $_SESSION['nombreUsuario'] = $user['nombreUsuario'];
    $_SESSION['rolUsuario']  = $user['rolUsuario'];
    $_SESSION['infoCompleta']  = $user['infoCompleta'];
    $_SESSION['usuario']= $user['usuario'];
    $_SESSION['status']=$user['status'];

    if($_SESSION['rolUsuario'] == 1){
     echo 1;
   }else 
   if($_SESSION['rolUsuario'] == 2){
    echo 2;
  }else if($_SESSION['rolUsuario'] == 3){
    if($_SESSION['status']==0){
     echo 3;
   }else {
    echo 4;
   }
 }

}else{

 echo 5;
}


parent::cerrar();
}

}
?>