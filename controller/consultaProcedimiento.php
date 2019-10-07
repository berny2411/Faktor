 <?php 
 require_once("model/procedimiento.php");
 $obj=new procedimiento();
 $datos=$obj->getListProcedimiento();
 $num=1;
 if ($_SESSION['rolUsuario']==1 || $_SESSION['rolUsuario']==2){
 	foreach ($datos as $key ) {
 		?>
 		<tr>
 			<td><?php echo $num ?></td>
 			<td>
 				<?php 
 				$medico=$obj->getUserByMedico($key['Usuario_idUsuario']); 
 				$nombreM='';
 				if($medico){
 					echo $medico[0]['nombreUsuario'];
 				}

 				?>

 			</td>
 			<td>
 				<?php
 				$paciente=$obj->getUserByPaciente($key['Paciente_idPaciente']); 
 				$nombreP='';
 				if($paciente){
 					echo $paciente[0]['nombrePaciente'];
 				}
 				?>

 			</td>
 			<td><?php echo $key['siniestro']; ?></td>
 			<td><?php echo date('Y-m-d', strtotime($key['fechaCasoMedico'])); ?></td>
 			<td><?php echo $key['rolMedicoEnCaso']; ?></td>
 			<td><?php echo $key['honorariosMedico']; ?></td>
 			<td> <?php 
 			switch ($key['status']) {
 				case 4:
 				?>
 				<span class="badge badge-warning">INCOMPLETO</span>
 				<?php
 				break;
 				case 5:
 				?>
 				<span class="badge badge-pending" >REVISION</span>
 				<?php
 				break;
 				case 3:
 				?>
 				<span class="badge badge-info">EN PROCESO</span>
 				<?php
 				break;
 				case 2:
 				?>
 				<span class="badge badge-secondary">ACEPTADO</span>
 				<?php
 				break;
 				case 1:
 				?>
 				<span class="badge badge-danger">RECHAZADO</span>
 				<?php
 				break;
 				case 0:
 				?>
 				<span class="badge badge-success">CERRADO</span>
 				<?php
 				break;
 			}
 			?>
 		</td>
 		<td> 
 			<?php if ($_SESSION['rolUsuario']==1){
 				?> 
 				<a href="./master.php?page=procedimiento/desgloceProcedimiento&id=<?php echo $key['idCasoMedico']; ?>">
 					<button class="btn btn-primary" title="Ver"><span class="fa fa-eye fa-lg" style="color:#FFFFFF;"></span></button>
 				</a>
 				<button class="btn btn-danger" onclick="btnDeletePrc(<?php echo $key['idCasoMedico']; ?>,<?php echo $key['documentosCasoMedico_iddocumentosCasoMedico']; ?>)" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
 				<?php 
 			}else{
 				?>
 				<a href="./admin.php?page=procedimiento/desgloceProcedimiento&id=<?php echo $key['idCasoMedico']; ?>">
 					<button class="btn btn-primary" title="Ver"><span class="fa fa-eye fa-lg" style="color:#FFFFFF;"></span></button>
 				</a>
 				<?php
 			}
 			?>
 		</td>
 	</tr>
 	<?php 
 	$num+=1; 
 }
 
}else if($_SESSION['rolUsuario']==3){
	$numM1=0;
	$numM2=0;
	foreach ($datos as $key => $value ) {
		if($_SESSION['idUsuario']==$value['Usuario_idUsuario']){
			if($value['status']==4){
				$lista1[$numM1]=$value;
				$numM1+=1;
			}
			else{
				$lista2[$numM2]=$value;
				$numM2+=1;
			}


		}
	}


$count = count($lista1);
$count2=count($lista2);
$num=1;
for ($i = 0; $i < $count; $i++) {
	?>

            <tr>
			<td><?php echo $num; ?></td>
			<td>
				<?php 
				$medico=$obj->getUserByMedico($lista1[$i]["Usuario_idUsuario"]); 
				$nombreM='';
				if($medico){
					echo $medico[0]['nombreUsuario'];
				}

				?>

			</td>
			<td>
				<?php
				$paciente=$obj->getUserByPaciente($lista1[$i]["Paciente_idPaciente"]); 
				$nombreP='';
				if($paciente){
					echo $paciente[0]['nombrePaciente'];
				}
				?>

			</td>
			<td><?php echo $lista1[$i]["siniestro"] ?></td>
			<td><?php echo date('Y-m-d', strtotime($lista1[$i]["fechaCasoMedico"])); ?></td>
			<td><?php echo $lista1[$i]["rolMedicoEnCaso"] ?></td>
			<td><?php echo $lista1[$i]["honorariosMedico"] ?></td>
			<td> <?php 
			switch ($lista1[$i]['status']) {
				case 4:
				?>
				<span class="badge badge-warning">INCOMPLETO</span>
				<?php
				break;
				case 5:
				?>
				<span class="badge badge-pending" >REVISION</span>
				<?php
				break;
				case 3:
				?>
				<span class="badge badge-info">EN PROCESO</span>
				<?php
				break;
				case 2:
				?>
				<span class="badge badge-secondary">ACEPTADO</span>
				<?php
				break;
				case 1:
				?>
				<span class="badge badge-danger">RECHAZADO</span>
				<?php
				break;
				case 0:
				?>
				<span class="badge badge-success">CERRADO</span>
				<?php
				break;
			}
			?></td>

			<td> 
				<a href="./medico.php?page=procedimiento/desgloceProcedimiento&id=<?php echo $lista1[$i]['idCasoMedico']; ?>">
					<button class="btn btn-primary" title="Ver"><span class="fa fa-eye fa-lg" style="color:#FFFFFF;"></span></button>
				</a>
				<button class="btn btn-danger" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
			</td>
		</tr>
<?php
$num+=1;
}

for ($i = 0; $i < $count2; $i++) {
	?>

            <tr>
			<td><?php echo $num; ?></td>
			<td>
				<?php 
				$medico=$obj->getUserByMedico($lista2[$i]["Usuario_idUsuario"]); 
				$nombreM='';
				if($medico){
					echo $medico[0]['nombreUsuario'];
				}

				?>

			</td>
			<td>
				<?php
				$paciente=$obj->getUserByPaciente($lista2[$i]["Paciente_idPaciente"]); 
				$nombreP='';
				if($paciente){
					echo $paciente[0]['nombrePaciente'];
				}
				?>

			</td>
			<td><?php echo $lista2[$i]["siniestro"] ?></td>
			<td><?php echo date('Y-m-d', strtotime($lista2[$i]["fechaCasoMedico"])); ?></td>
			<td><?php echo $lista2[$i]["rolMedicoEnCaso"] ?></td>
			<td><?php echo$lista2[$i]["honorariosMedico"]?></td>
			<td> <?php 
			switch ($lista2[$i]['status']) {
				case 4:
				?>
				<span class="badge badge-warning">INCOMPLETO</span>
				<?php
				break;
				case 5:
				?>
				<span class="badge badge-pending" >REVISION</span>
				<?php
				break;
				case 3:
				?>
				<span class="badge badge-info">EN PROCESO</span>
				<?php
				break;
				case 2:
				?>
				<span class="badge badge-secondary">ACEPTADO</span>
				<?php
				break;
				case 1:
				?>
				<span class="badge badge-danger">RECHAZADO</span>
				<?php
				break;
				case 0:
				?>
				<span class="badge badge-success">CERRADO</span>
				<?php
				break;
			}
			?></td>

			<td> 
				<a href="./medico.php?page=procedimiento/desgloceProcedimiento&id=<?php echo $lista2[$i]['idCasoMedico']; ?>">
					<button class="btn btn-primary" title="Ver"><span class="fa fa-eye fa-lg" style="color:#FFFFFF;"></span></button>
				</a>
				<button class="btn btn-danger" title="Eliminar"><span class="fa  fa-trash-o fa-lg" style="color:#FFFFFF;"></span></button>
			</td>
		</tr>
<?php
$num+=1;
}
}

?>