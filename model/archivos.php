<?php
# incluimos la clase conexion.php 
 require_once('conexion.php');
 
 # creamos la clase Aseguradora  con una herencia de la clase Conexion 
 class Archivos extends Conexion {

      #Funcion que permite hacer una consulta general de la tabla DocumentosPersonal
      public  function getListArchivos(){
            parent::conectar();
            $sql="SELECT * from DocumentosPersonal";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }

      public  function getListUsuarios(){
            parent::conectar();
            $sql="SELECT idUsuario,usuario,nombreUsuario,rolUsuario from Usuario";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }
      #Funcion que permite hacer una consulta especifica con la llave primaria de la tabla usuario_has_aseguradora
      public function getUserById(){
            parent::conectar();
                        $query  ="SELECT idDocumentosPersonal, urlArchivo FROM DocumentosPersonal";
                        $result =parent::consultaArreglo($query);
                        return $result;
                 
                  parent::cerrar();
            }
      
      public function getUserByCaso($id=NULL){
            parent::conectar();
                        if(!empty($id)){
                        $query  ="SELECT documentosCasoMedico_iddocumentosCasoMedico FROM CasoMedico WHERE Usuario_idUsuario=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                 
                  parent::cerrar();
            }

      public function getCasoMedico($id=NULL){
            parent::conectar();
                         if(!empty($id)){
                        $query  ="SELECT urlArchivoC FROM documentosCasoMedico WHERE iddocumentosCasoMedico=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                 
                  parent::cerrar();
            }


     
            
      #Funcion permite modificar los datos de la tabla usuario_has_aseguradora
      public function updateArchivos(){
      	parent::conectar();
            $id=$_SESSION['usuario'];
            $hoy=date("Y-m-d");
            
      $dateVariable      = strtotime($hoy);//your date variable goes here
      $date_plus_60_days = date('Y-m-d', strtotime('+ 1 days', $dateVariable));

      	parent::query("UPDATE DocumentosPersonal SET  fechaCreacion='$hoy',fechaFinal='$date_plus_60_days' WHERE idDocumentosPersonal='$id'");


            parent::cerrar();


      }

      public function deleteArchivosCaso($id){
      parent::conectar();

      parent::query("DELETE FROM documentosCasoMedico WHERE iddocumentosCasoMedico=$id");
     

      parent::cerrar();
 }
      
}
?>