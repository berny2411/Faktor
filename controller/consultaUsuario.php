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
            <td> 
            <a href="./master.php?page=usuario/modificarUsuario&id=<?php echo $key['idUsuario'] ?>" title="Editar Usuario: <?php echo $key['nombreUsuario'] ?>">
               <button class="btn btn-primary" title="Ver"><span class="fa fa-pencil fa-lg" style="color:#FFFFFF;"></span></button>
            </a>
               <button class="btn btn-danger" onclick="btnDeleteA()" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
            </td>
        </tr>
        
    <?php 
    } if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 2){

        ?>
        <tr>
            <td><?php echo $key['idUsuario']; ?></td>
            <td><?php echo $key['usuario']; ?></td>
            <td><?php echo $key['nombreUsuario']; ?></td>
            <td><?php echo $key['apellidoPatUsuario']; ?></td>
            <td><?php echo $key['direccionUsuario']; ?></td>
            <td><?php echo $key['numTelefonoUsuario']; ?></td>
            <td> 
            <a href="./admin.php?page=usuario/modificarUsuario&id=<?php echo $key['idUsuario'] ?>" title="Editar Usuario: <?php echo $key['nombreUsuario'] ?>">
                <button class="btn btn-primary" title="Ver"><span class="fa fa-pencil fa-lg" style="color:#FFFFFF;"></span></button>
            </a>
            <button class="btn btn-danger" onclick="btnDeleteA()" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button> 
            </td>
        </tr>
        
    <?php 
    }
    else if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 3){
        }
    }

?>