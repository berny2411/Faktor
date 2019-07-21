 <?php 
    require_once("model/paciente.php");
    $obj=new Paciente();
    $datos=$obj->getListPaciente();
    foreach ($datos as $key ) {
        ?>
        <tr>
            <td><?php echo $key['idPaciente']; ?></td>
            <td><?php echo $key['nombrePaciente']; ?></td>
            <td><?php echo $key['apellidoPatPaciente']; ?></td>
            <td><?php echo $key['apellidoMatPaciente']; ?></td>
            <td><?php echo $key['hospital']; ?></td>
            <td><?php echo $key['cuartoHospital']; ?></td>
            <td><?php echo $key['numTelefonoPaciente']; ?></td>
            <td><?php echo $key['emailPaciente']; ?></td>
            <td> 
            <a href="./index.php?page=paciente/modificarPaciente&id=<?php echo $key['idPaciente'] ?>" title="Editar paciente: <?php echo $key['nombrePaciente'] ?>">
               <input type="image" src="img/editar.png" class="btn btn-primary">
            </a>
              <input type="image" src="img/eliminar.png" class="btn btn-danger" onclick="btnDeleteP(<?php echo $key['idPaciente']?>)" id="btnDeleteP"> 
            </td>
        </tr>
        
    <?php 
    }

?>