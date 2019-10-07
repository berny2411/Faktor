 <?php 
 # Clase conexion: permite conectar al ftp y ejecutar la subida y descarga de archuivos
    class ConexionFTP
    {
        // FTP server details
        $ftpHost   = 'ftp.example.com';
        $ftpUsername = 'ftpuser';
        $ftpPassword = '*****';
        # Funcion que permite conectarnos a la base de datos
        public function conectarFTP(){
           
        	// open an FTP connection
        	$connId = ftp_connect($ftpHost) or die("Couldn't connect to $ftpHost");
        	// try to login
        	if(@ftp_login($connId, $ftpUsername, $ftpPassword)){
        		return $connId;
        	}else{
        		echo "No se pudo conectar como $ftpUsername";
        	}

        	function SubirArchivo($archivo_local,$archivo_remoto){
        	//Sube archivo de la maquina Cliente al Servidor (Comando PUT)
        	$id_ftp=conectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP 
        	ftp_put($id_ftp,$archivo_remoto,$archivo_local,FTP_BINARY);//Sube un archivo al Servidor FTP en modo Binario
        	ftp_quit($id_ftp); //Cierra la conexion FTP
}
        
    } // End Class
?>