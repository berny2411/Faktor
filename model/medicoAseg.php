<?php
# incluimos la clase conexion.php 
 require_once('conexion.php');
 
 # creamos la clase Aseguradora  con una herencia de la clase Conexion 
 class medicoAsg extends Conexion {
      #Funcion addAseguradora: nos permite insertar datos a la tabla aseguradora
      public function addmedAseguradora ($medico,$aseguradora, $usuario, $contraseña)
	  {
            # parent:  permite traer las funciones heredadas de la clase Conexion 
      	parent::conectar();
            $medic =parent::filtrar($medico);
            $asegurad = parent::filtrar($aseguradora);
            $usuario= parent::filtrar($usuario);
            $contrase = parent::filtrar($contraseña);


            return parent::query('insert into Usuario_has_Aseguradora(Usuario_idUsuario, Aseguradora_idAseguradora, usuarioAseguradora,passwordAseguradora) values("'.$medic.'","'.$asegurad.'", "'.$usuario.'","'.$contrase.'")');

      	parent::cerrar();

      }
      #Funcion que permite hacer una consulta general de la tabla aseguradora
      public  function getListMedAseguradora(){
            parent::conectar();
            $sql="SELECT * from Usuario_has_Aseguradora";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }
      #Funcion que permite hacer una consulta especifica con la llave primaria de la tabla aseguradora
      public function getUserById($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT * FROM Usuario_has_Aseguradora WHERE idAseguradora=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            }
            
            
      #Funcion permite modificar los datos de la tabla aseguradora
      public function updateAseguradora($id,$aseguradora,$direccion,$pagina){
      	parent::conectar();
            $id=$id;
      	$aseguradora = parent::filtrar($aseguradora);
      	$direccion = parent::filtrar($direccion);
      	$pagina = $pagina;

      	parent::query("UPDATE Usuario_has_Aseguradora SET nombreAseguradra='$aseguradora', direccionAseguradora ='$direccion', pagina='$pagina' WHERE idAseguradora= $id");

      	parent::cerrar();


      }
      public function validarDA($id){
  parent::conectar();

  $consulta = "SELECT * FROM CasoMedico where Aseguradora_idAseguradora=".$id;
  $verificar_aseguradora = parent::verificarRegistros($consulta);

  if($verificar_aseguradora > 0){

      return  1;

  }else{
      return 2;
  }
parent::cerrar();
}
      #Funcion permite borrar una fila de la tabla por medio del id
      public function deleteMA($idA,$idU){
      parent::conectar();

      $result=parent::query("DELETE FROM Usuario_has_Aseguradora WHERE Aseguradora_idAseguradora=$idA AND Usuario_idUsuario=$idU");
     return $result;

      parent::cerrar();
 }
}
?>