       <?php
# incluimos la clase conexion.php 
 require_once('conexion.php');

 # creamos la clase Aseguradora  con una herencia de la clase Conexion 
 class procedimiento extends Conexion {
      #Funcion addAseguradora: nos permite insertar datos a la tabla aseguradora

      public function addCaso ($siniestro, $descripcion,$rol,$honorario,$selectPas,$selectAs)
	  {
            session_start();
            $hoy = getdate();

            # parent:  permite traer las funciones heredadas de la clase Conexion 
      	parent::conectar();

            parent::query('insert into documentosCasoMedico(urlArchivoC,Usuario_idUsuario) values("Sin Ruta","'.$_SESSION['idUsuario'].'")');

            $result= parent::consultaArreglo('SELECT  iddocumentosCasoMedico FROM documentosCasoMedico where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" ORDER BY iddocumentosCasoMedico DESC LIMIT 1');
                  if($result){
                        $documentosCM=$result[0]['iddocumentosCasoMedico'];
                  }

            parent::query('insert into CasoMedico(siniestro,fechaCasoMedico,descripcion, rolMedicoEnCaso,honorariosMedico, status, Usuario_idUsuario,   documentosCasoMedico_iddocumentosCasoMedico,Paciente_idPaciente,Aseguradora_idAseguradora) values("'.$siniestro.'","'.date("Y-m-d ").'","'.$descripcion.'","'.$rol.'","'.$honorario.'",4, "'.$_SESSION['idUsuario'].'","'.$documentosCM.'","'.$selectPas.'","'.$selectAs.'")');

            $resultado= parent::consultaArreglo('SELECT  idCasoMedico FROM CasoMedico where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" AND Paciente_idPaciente="'.$selectPas.'" ORDER BY idCasoMedico DESC');
                  if($resultado){
                        $nom=sprintf('%s_%s',$_SESSION['usuario'], $_SESSION['nombreUsuario']);
                        $carpeta='../files/'.$nom.'/Caso_Medico';
                        $filepath=sprintf('%s/%s_%s',$carpeta,'CasoMedico',$resultado[0]['idCasoMedico']);  
                        if (!file_exists($carpeta)) {
                              mkdir($carpeta,0777);
                              mkdir($filepath,0777);
                        }else{
                              mkdir($filepath,0777);
                        }
                  }

            parent::query("UPDATE documentosCasoMedico SET urlArchivoC='$filepath' WHERE iddocumentosCasoMedico=$documentosCM");



      	parent::cerrar();

      }
      #Funcion que permite hacer una consulta general de la tabla aseguradora
      public  function getListProcedimiento(){
            parent::conectar();
            $sql="SELECT * FROM CasoMedico ORDER BY status DESC";
            $datos=parent::consultaArreglo($sql);
            return $datos;
            parent::cerrar();
      }

       public  function getdocumentoCaso(){
                 parent::conectar();

                 $consulta='SELECT  iddocumentosCasoMedico FROM documentosCasoMedico where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" ORDER BY iddocumentosCasoMedico DESC LIMIT 1';
                 $extraido=parent::consultaArreglo($consulta);
                 return $extraido;

                 parent::cerrar();
           }

           public  function addArchivoCaso(){
                 parent::conectar();

                 $consulta='SELECT documentosCasoMedico_iddocumentosCasoMedico FROM CasoMedico where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" ORDER BY idCasoMedico DESC LIMIT 1';
                 $extraido=parent::consultaArreglo($consulta);
                 return $extraido;

                 parent::cerrar();
           }
            public  function verificacionCaso(){
                 parent::conectar();

                 $consulta='SELECT * FROM CasoMedico where Usuario_idUsuario= "'.$_SESSION['idUsuario'].'" ORDER BY idCasoMedico DESC LIMIT 1';
                 $extraido=parent::consultaArreglo($consulta);
                 return $extraido;

                 parent::cerrar();
           }

      #Funcion que permite hacer una consulta especifica con la llave primaria de la tabla aseguradora
      public function getdocumentoCasoMedico($id=NULL){
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
            
      public function getUserByPaciente($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT nombrePaciente,urlPaciente FROM Paciente WHERE idPaciente=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            } 

            public function getUserByMedico($id=NULL){
            parent::conectar();
                  if(!empty($id)){
                        $query  ="SELECT nombreUsuario FROM Usuario WHERE idUsuario=".$id;
                        $result =parent::consultaArreglo($query);
                        return $result;
                  }else{
                        return false;
                  }
                  parent::cerrar();
            }      

            public function getUserById($id=NULL){
              parent::conectar();
              if(!empty($id)){
                $query  ="SELECT * FROM CasoMedico WHERE idCasoMedico=".$id;
                $result =parent::consultaArreglo($query);
                return $result;
              }else{
                return false;
              }
              parent::cerrar();
            }       
            
      #Funcion permite modificar los datos de la tabla aseguradora
     public function updateProcedimiento($id,$aseguradora,$direccion,$pagina){
            parent::conectar();

            parent::query("UPDATE documentosCasoMedico SET urlArchivoC='$aseguradora' WHERE iddocumentosCasoMedico=$id");

            parent::cerrar();

      } 
      public function updateCaso($id,$siniestro ,$descripcion, $rol,$honorario){
            parent::conectar();

            parent::query("UPDATE CasoMedico SET siniestro='$siniestro', descripcion ='$descripcion',  rolMedicoEnCaso='$rol',honorariosMedico ='$honorario' WHERE idCasoMedico=$id");

            parent::cerrar();

      }

       public function updateStatusProc($idC,$statusPr){
            parent::conectar();

            return parent::query("UPDATE CasoMedico SET status='$statusPr' WHERE idCasoMedico=$idC");

            parent::cerrar();

      }
      #Funcion permite borrar una fila de la tabla por medio del id
      public function deleteProcedimiento($id){
      parent::conectar();

      parent::query("DELETE FROM CasoMedico WHERE idCasoMedico=$id");
     

      parent::cerrar();
 }
}
?>