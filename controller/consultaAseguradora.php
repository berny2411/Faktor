 <?php 
    require_once("model/aseguradora.php");
    $obj=new Aseguradora();
    $datos=$obj->getListAseguradora();
    foreach ($datos as $key ) {
        ?>
        <tr>
            <td><?php echo $key['idAseguradora']; ?></td>
            <td><?php echo $key['nombreAseguradra']; ?></td>
            <td><?php echo $key['direccionAseguradora']; ?></td>
            <td><?php echo $key['pagina']; ?></td>
            <td> 
            <a href="./index.php?page=modificarAseguradora&id=<?php echo $key['idAseguradora'] ?>" title="Editar aseguradora: <?php echo $key['nombreAseguradra'] ?>">
               <input type="image" src="img/editar.png" class="btn btn-primary">
            </a>
             <a href="#"  id="btnDeleteUser" title="Borrar usuario: <?php echo $key['nombreAseguradra']?>">
                <input type="image" src="img/eliminar.png" class="btn btn-danger">
                </a>
            </td>
        </tr>
        
    <?php 
    }

?>