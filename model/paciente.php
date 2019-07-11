<?php
 require_once('conexion.php');

 class Paciente extends Conexion {

      public function addPaciente ($nombre, $apellidop, $apellidom, $hospital, $chospital, $numtel, $email)
      {
      	parent::conectar();

      	parent::query('insert into paciente (nombrePaciente, apellidoPatPaciente, apellidoMatPaciente, hospital ,cuartoHospital, numTelefonoPaciente, emailPaciente) values("'.$nombre.'", "'.$apellidop.'", "'.$apellidom.'", "'.$hospital.'", "'.$chospital.'", "'.$numtel.'", "'.$email.'")');

      	parent::cerrar();


      }

      public  function getListPaciente(){
            parent::conectar();

            $consulta='SELECT * FROM paciente';
            $extraido=parent::consultaArreglo($consulta);
            return $extraido;

      }

      public function updatePaciente($id,$nombre,$apellidoP,$apellidoM,$hospital,$cuartoHospital,$numTel,$email){
      	parent::conectar();

      	$nombre = parent::filtrar($nombre);
            $apellidoP = parent::filtrar($apellidoP);
            $apellidoM = parent::filtrar($apellidoM);
            $hospital = parent::filtrar($hospital);
            $cuartoHospital= parent::filtrar($cuartoHospital)
            $numTel = parent::filtrar($numTel);
            $email = parent::filtrar($email);

      	parent::query("UPDATE Paciente SET nombrePaciente='$nombre', apellidoPatPaciente='$apellidoP', apellidoMatPaciente='$apellidoM',hospital='$hospital',cuartoHospital='$cuartoHospital',numTelefonoPaciente=''$numTel,emailPaciente='$email' WHERE idPaciente= '$id'");

      	parent::cerrar();


      }

      public function deleteAseguradora($id){

      parent::conectar();

      parent::query("DELETE FROM Aseguradora WHERE id='$id'");

      parent::cerrar();
      }
 }
?>