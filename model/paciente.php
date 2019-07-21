<?php
#incluimos el archivo conexion.php
 require_once('conexion.php');
#Creacion de la clase Paciente con una herencia de la clase Conexion
 class Paciente extends Conexion {
      #Funcion que permite agregarlos datos a la tabla paciente 
      public function addPaciente ($nombre, $apellidop, $apellidom, $hospital, $chospital, $numtel, $email)
      {
      	parent::conectar();

      	parent::query('insert into paciente (nombrePaciente, apellidoPatPaciente, apellidoMatPaciente, hospital ,cuartoHospital, numTelefonoPaciente, emailPaciente) values("'.$nombre.'", "'.$apellidop.'", "'.$apellidom.'", "'.$hospital.'", "'.$chospital.'", "'.$numtel.'", "'.$email.'")');

      	parent::cerrar();


      }
      #Funcion que permite hacer una consulta general a la tabla paciente 
      public  function getListPaciente(){
            parent::conectar();

            $consulta='SELECT * FROM paciente';
            $extraido=parent::consultaArreglo($consulta);
            return $extraido;

      }
      # Funcion que permite hacer una consulta especifica por medio del id
       public function getUserById($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT * FROM paciente WHERE idPaciente=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            }
      #Funcion que permite modificar los datos de la tabla paciente      
      public function updatePaciente($id,$nombre,$apellidoP,$apellidoM,$hospital,$cuartoHospital,$numTel,$email){
      	parent::conectar();

      	$nombre = parent::filtrar($nombre);
            $apellidoP = parent::filtrar($apellidoP);
            $apellidoM = parent::filtrar($apellidoM);
            $hospital = parent::filtrar($hospital);
            $cuartoHospital= $cuartoHospital;
            $numTel = parent::filtrar($numTel);
            $email = $email;

      	parent::query("UPDATE paciente SET nombrePaciente='$nombre', apellidoPatPaciente='$apellidoP', apellidoMatPaciente='$apellidoM', hospital='$hospital', cuartoHospital='$cuartoHospital',numTelefonoPaciente='$numTel',emailPaciente='$email' WHERE idPaciente= '$id'");

      	parent::cerrar();


      }
      #Funcion que permite borrar una fila de la tabla paciente por medio del id 
      public function deletePaciente($id){

      parent::conectar();

      parent::query("DELETE FROM paciente WHERE idPaciente=$id");

      parent::cerrar();
      }
 }
?>