 <?php 
    require_once("model/paciente.php");
    $obj=new Paciente();
    $datos=$obj->getLastPaciente();
    foreach ($datos as $key ) {
        ?>
        <tr>
            <td><?php echo $key['idPaciente']; ?></td>
            <td><?php echo $key['nombrePaciente']; ?></td>
            <td><?php echo $key['apellidoPatPaciente']; ?></td>
            <td><?php echo $key['apellidoMatPaciente']; ?></td>
            <td><?php echo $key['numTelefonoPaciente']; ?></td>
            <td><?php echo $key['emailPaciente']; ?></td>
            <td> 

        
        
            <a href="medico.php?page=paciente/modificarPaciente&id=<?php echo $key['idPaciente'] ?>" title="Editar paciente: <?php echo $key['nombrePaciente'] ?>">
               <button class="btn btn-primary" title="Ver"><span class="fa fa-pencil fa-lg" style="color:#FFFFFF;"></span></button>
            </a>
             <button class="btn btn-danger" onclick="btnDeleteP(<?php echo $key['idPaciente']?>)" id="btnDeleteP" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
            </td>
        </tr>
        
    <?php 
    }

?>

