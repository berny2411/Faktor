<?php
#incluimos el archivo conexion.php
 require_once('conexion.php');
#Creacion de la clase Paciente con una herencia de la clase Conexion
 class Paciente extends Conexion {
      #Funcion que permite agregarlos datos a la tabla paciente 
      public function addPaciente ($nombre, $apellidop, $apellidom, $hospital, $chospital, $numtel, $email)
      {
            session_start();
      	parent::conectar();

      	parent::query('insert into Paciente (nombrePaciente, apellidoPatPaciente, apellidoMatPaciente, hospital ,cuartoHospital, numTelefonoPaciente, emailPaciente,Usuario_idUsuario) values("'.$nombre.'", "'.$apellidop.'", "'.$apellidom.'", "'.$hospital.'","'.$chospital.'", "'.$numtel.'", "'.$email.'","'.$_SESSION['idUsuario'].'")');
            

            $resultado= parent::consultaArreglo('SELECT  idPaciente,nombrePaciente FROM Paciente where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" ORDER BY idPaciente DESC LIMIT 1');
                  if($resultado){
                        $idP=$resultado[0]['idPaciente'];
                        $nom=sprintf('%s_%s',$_SESSION['usuario'], $_SESSION['nombreUsuario']);
                        $carpeta='../files/'.$nom.'/Paciente';
                        $filepath=sprintf('%s/%s_%s',$carpeta,$resultado[0]['idPaciente'],$resultado[0]['nombrePaciente']);  
                        if (!file_exists($carpeta)) {
                              mkdir($carpeta,0777,true);
                              mkdir($filepath,0777,true);
                        }else{
                              mkdir($filepath,0777,true);
                        }
                  }

                  parent::query("UPDATE Paciente SET  urlPaciente='$filepath' WHERE idPaciente=$idP");

      parent::cerrar();



      }

      #Funcion que permite hacer una consulta general a la tabla paciente 
      public  function getListPaciente(){
           
            parent::conectar();
            $consulta='SELECT  idPaciente,nombrePaciente FROM Paciente where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" ORDER BY idPaciente DESC';
            $extraido=parent::consultaArreglo($consulta);
            return $extraido;

      }

      public  function getLimitPaciente(){
            parent::conectar();

            $consulta='SELECT idPaciente,urlPaciente FROM Paciente where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" ORDER BY idPaciente DESC LIMIT 1';
            $extraido=parent::consultaArreglo($consulta);
            return $extraido;

      }
         #Funcion que permite hacer una consulta general de la tabla aseguradora
      public  function getLastPaciente(){
            parent::conectar();
           
            $consulta='SELECT * FROM Paciente';
            $extraido=parent::consultaArreglo($consulta);
            return $extraido;
      }

      # Funcion que permite hacer una consulta especifica por medio del id
       public function getUserById($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT * FROM Paciente WHERE idPaciente=".$id;
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

      	parent::query("UPDATE Paciente SET nombrePaciente='$nombre', apellidoPatPaciente='$apellidoP', apellidoMatPaciente='$apellidoM', hospital='$hospital', cuartoHospital='$cuartoHospital',numTelefonoPaciente='$numTel',emailPaciente='$email' WHERE idPaciente= '$id'");

      	parent::cerrar();


      }
      #Funcion que permite borrar una fila de la tabla paciente por medio del id 
      public function deletePaciente($id){

      parent::conectar();

      parent::query("DELETE FROM Paciente WHERE idPaciente=$id");

      parent::cerrar();
      }
 }
?>