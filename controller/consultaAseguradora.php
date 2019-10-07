 <?php 
    require_once("model/aseguradora.php");
    $obj=new Aseguradora();
    $datos=$obj->getListAseguradora();

    if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 1){
    	foreach ($datos as $key ) {
        

        ?>
        <tr>
            <td><?php echo $key['idAseguradora']; ?></td>
            <td><?php echo $key['nombreAseguradra']; ?></td>
            <td><?php echo $key['direccionAseguradora']; ?></td>
            <td><?php echo $key['pagina']; ?></td>
            <td> 
            <a href="./master.php?page=aseguradora/modificarAseguradora&id=<?php echo $key['idAseguradora'] ?>" title="Editar aseguradora: <?php echo $key['nombreAseguradra'] ?>">
                <button class="btn btn-primary" title="Ver"><span class="fa fa-pencil fa-lg" style="color:#FFFFFF;"></span></button>
            </a>
        
         <button class="btn btn-danger" onclick="btnDeleteA(<?php echo $key['idAseguradora']?>)" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
     </td>
        </tr>
        
    <?php
}
    }else if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 2){
    	foreach ($datos as $key ) {
    ?>
     <tr>
            <td><?php echo $key['idAseguradora']; ?></td>
            <td><?php echo $key['nombreAseguradra']; ?></td>
            <td><?php echo $key['direccionAseguradora']; ?></td>
            <td><?php echo $key['pagina']; ?></td>
            <td> 
            <a href="./admin.php?page=aseguradora/modificarAseguradora&id=<?php echo $key['idAseguradora'] ?>" title="Editar aseguradora: <?php echo $key['nombreAseguradra'] ?>">
                <button class="btn btn-primary" title="Ver"><span class="fa fa-pencil fa-lg" style="color:#FFFFFF;"></span></button>
            </a>
        
         <button class="btn btn-danger" onclick="btnDeleteA(<?php echo $key['idAseguradora']?>)" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
     </td>
        </tr>
    <?php
}
        }
    else if(!isset($_SESSION['rolUsuario']) || $_SESSION['rolUsuario'] == 3){
    	$medicoAs=$obj->getListAseguradora2();
    	foreach ($medicoAs as $key ) {
    		if($aseguradora=$obj->getUserById($key['Aseguradora_idAseguradora'])){
    ?>
    <tr>
            <td><?php echo $aseguradora[0]['idAseguradora']; ?></td>
            <td><?php echo $aseguradora[0]['nombreAseguradra']; ?></td>
            <td><?php echo $aseguradora[0]['direccionAseguradora']; ?></td>
            <td><?php echo $aseguradora[0]['pagina']; ?></td>
            <td> 
              <button class="btn btn-danger" onclick="btnDeleteMA(<?php echo $aseguradora[0]['idAseguradora']?>,<?php echo $_SESSION['idUsuario']?>)" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
            </td>
        </tr>
    <?php
}
        }
    }

?>

