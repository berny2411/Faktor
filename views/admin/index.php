<?php
  // Se prendio esta mrd :v
   class ejemplo{  

    public function imprimir($aseguradora,$direccion,$pagina){

    echo "Aseguradora: ", $aseguradora;
    echo "Direccion: ", $direccion;
    echo  "Pagina: ", $pagina; 
  }

}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
  </head>
  <body>
    <!-- ucfirst convierte la primera letra en mayusculas de una cadena -->
    Bienvenido administrador <?php echo ucfirst($_SESSION['nombre']); ?>
    <a href="../../controller/cerrarSesion.php">
      <button type="button" name="button">Cerrar sesion</button>
    </a>
  </body>
</html>
