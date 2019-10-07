 <?php 
    require_once("model/procedimiento.php");
    $obj=new procedimiento();
    $datos=$obj->getListProcedimiento();
    foreach ($datos as $key ) {
        if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 1){

        ?>
        <tr>
            <td><?php echo $key['idAseguradora']; ?></td>   
            <td><?php echo $key['nombreAseguradra']; ?></td>
            <td><?php echo $key['direccionAseguradora']; ?></td>
            <td><?php echo $key['pagina']; ?></td>
            <td> 
            <a href="./admin.php?page=aseguradora/modificarAseguradora&id=<?php echo $key['idAseguradora'] ?>" title="Editar aseguradora: <?php echo $key['nombreAseguradra'] ?>">
               <input type="image" src="img/editar.png" class="btn btn-primary">
            </a>
                <input type="image" src="img/eliminar.png" class="btn btn-danger" onclick="btnDeleteA(<?php echo $key['idAseguradora']?>)">  
            </td>
        </tr>
        
    <?php 
    }
    else if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 3){

    ?>
    <tr>
            <td><?php echo $key['idAseguradora']; ?></td>
            <td><?php echo $key['nombreAseguradra']; ?></td>
            <td><?php echo $key['direccionAseguradora']; ?></td>
            <td><?php echo $key['pagina']; ?></td>
            <td> 
              
            </td>
        </tr>
    <?php
        }
    }

?>