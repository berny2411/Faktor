<?php
# incluimos la clase conexion.php 
 require_once('conexion.php');
 
 # creamos la clase Aseguradora  con una herencia de la clase Conexion 
 class Aseguradora extends Conexion {
      #Funcion addAseguradora: nos permite insertar datos a la tabla aseguradora
      public function addAseguradora ($aseguradora, $direccion, $pagina)
	  {
            # parent:  permite traer las funciones heredadas de la clase Conexion 
      	parent::conectar();
            $asegurad = parent::filtrar($aseguradora);
            $direc= parent::filtrar($direccion);
            $pag = parent::filtrar($pagina);


            $result=parent::query('insert into Aseguradora(nombreAseguradra, direccionAseguradora, pagina) values("'.$asegurad.'", "'.$direc.'","'.$pag.'")');
            return $result;

      	parent::cerrar();

      }
      #Funcion que permite hacer una consulta general de la tabla aseguradora
      public  function getListAseguradora(){
            parent::conectar();
            $sql="SELECT * from Aseguradora";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }

      public  function getListAseguradora3(){
            parent::conectar();
            $sql="SELECT * FROM Aseguradora ORDER BY idAseguradora DESC LIMIT 3";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }


      public  function getListAseguradora2(){
            parent::conectar();     
          $sql='SELECT * FROM Usuario_has_Aseguradora where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'"';
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }
         #Funcion que permite hacer una consulta general de la tabla aseguradora
      public  function getLastAseguradora(){
            parent::conectar();
            $sql="select last_insert_id()";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }

      public  function getAseguradora2($idUsuario,$idAseguradora){
            parent::conectar();     
          $sql='SELECT * FROM Usuario_has_Aseguradora where Usuario_idUsuario= "'.$idUsuario.'" AND Aseguradora_idAseguradora="'.$idAseguradora.'"';
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }
      #Funcion que permite hacer una consulta especifica con la llave primaria de la tabla aseguradora
      public function getUserById($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT * FROM Aseguradora WHERE idAseguradora=".$id;
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

      	return parent::query("UPDATE Aseguradora SET nombreAseguradra='$aseguradora', direccionAseguradora ='$direccion', pagina='$pagina' WHERE idAseguradora= $id");

      	parent::cerrar();


      }
      #Funcion permite borrar una fila de la tabla por medio del id
      public function deleteAseguradora($id){
      parent::conectar();

      return parent::query("DELETE FROM Aseguradora WHERE idAseguradora=$id");
     

      parent::cerrar();
 }
}
?>