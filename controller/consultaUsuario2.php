 <?php 
    require_once("model/usuario.php");
    $obj=new Usuario();
    $datos=$obj->getListUsuario();
    foreach ($datos as $key ) {
        if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 1){

        ?>
        <tr>
            <td><?php echo $key['idUsuario']; ?></td>
            <td><?php echo $key['usuario']; ?></td>
            <td><?php echo $key['nombreUsuario']; ?></td>
            <td><?php echo $key['apellidoPatUsuario']; ?></td>
            <td><?php echo $key['direccionUsuario']; ?></td>
            <td><?php echo $key['numTelefonoUsuario']; ?></td>
            <td><?php echo $key['numCuenta']; ?></td>
            <td><?php echo $key['bancoAfiliado']; ?></td>
            <td><?php echo $key['folioFiscal']; ?></td>
            <td><?php echo $key['rfc']; ?></td>
            <td> 
            <a href="./admin.php?page=usuario/modificarUsuario&id=<?php echo $key['idUsuario'] ?>" title="Editar Usuario: <?php echo $key['nombreUsuario'] ?>">
               <input type="image" src="img/editar.png" class="btn btn-primary">
            </a>
                <input type="image" src="img/eliminar.png" class="btn btn-danger" onclick="btnDeleteA(<?php echo $key['usuario']?>)">  
            </td>
        </tr>
        
    <?php 
    }
    else if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 3){

    ?>
    <tr>
            <td><?php echo $key['usuario']; ?></td>
            <td><?php echo $key['nombreUsuario']; ?></td>
            <td><?php echo $key['numTelefonoUsuario']; ?></td>
            <td><?php echo $key['rfc']; ?></td>
            <td> 
              
            </td>
        </tr>
    <?php
        }
    }

?>