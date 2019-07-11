<?php
 require_once('conexion.php');

 class Aseguradora extends Conexion {

      public function addAseguradora ($aseguradora, $direccion, $pagina)
	  {
      	parent::conectar();

            parent::query('insert into aseguradora(nombreAseguradra, direccionAseguradora, pagina) values("'.$aseguradora.'", "'.$direccion.'","'.$pagina.'")');

      	parent::cerrar();

      }

      public  function getListAseguradora(){
            parent::conectar();
            $sql="SELECT * from aseguradora";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }

      public function getUserById($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT * FROM aseguradora WHERE idAseguradora=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            }
            
            

      public function updateAseguradora($id,$aseguradora,$direccion,$pagina){
      	parent::conectar();
            $id=$id;
      	$aseguradora = parent::filtrar($aseguradora);
      	$direccion = parent::filtrar($direccion);
      	$pagina = $pagina;

      	parent::query("UPDATE aseguradora SET nombreAseguradra='$aseguradora', direccionAseguradora ='$direccion', pagina='$pagina' WHERE idAseguradora= $id");

      	parent::cerrar();


      }

      public function deleteAseguradora($id=NULL){
      parent::conectar();

      parent::query("DELETE FROM aseguradora WHERE id='$id'");
     

      parent::cerrar();
 }
}
?>