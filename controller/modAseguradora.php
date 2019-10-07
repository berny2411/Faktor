 <?php 
    require_once("model/aseguradora.php");
    $obj=new Aseguradora();
    $datos=$obj->getListAseguradora();
    foreach ($datos as $key ) {
        if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 1){
        ?>
        <tr>
            <td><?php echo $key['idAseguradora']; ?></td>
            <td><?php echo $key['nombreAseguradra']; ?></td>
            <td><?php echo $key['direccionAseguradora']; ?></td>
            <td><?php echo $key['pagina']; ?></td>
            <td align="center"> 
            <a href="./master.php?page=aseguradora/modificarAseguradora&id=<?php echo $key['idAseguradora'] ?>" title="Editar aseguradora: <?php echo $key['nombreAseguradra'] ?>">
                <button class="btn btn-primary" title="Ver"><span class="fa fa-pencil fa-lg" style="color:#FFFFFF;"></span></button>
            </a> 
            </td>
        </tr>
        
    <?php 
    }else if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 2){

    ?>
    <tr>
            <td><?php echo $key['idAseguradora']; ?></td>
            <td><?php echo $key['nombreAseguradra']; ?></td>
            <td><?php echo $key['direccionAseguradora']; ?></td>
            <td><?php echo $key['pagina']; ?></td>
            <td align="center"> 
            <a href="./admin.php?page=aseguradora/modificarAseguradora&id=<?php echo $key['idAseguradora'] ?>" title="Editar aseguradora: <?php echo $key['nombreAseguradra'] ?>">
                <button class="btn btn-primary" title="Ver"><span class="fa fa-pencil fa-lg" style="color:#FFFFFF;"></span></button>
            </a> 
            </td>
        </tr>
    <?php
        }
    }

?>