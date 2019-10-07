
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Registro Aseguradora</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="#">Menu</a></li>
							<li><a href="#">Documentos</a></li>
							<li class="active">subir Documentos</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="animated fadeIn">


		<div class="row">
			<?php
			/*require_once("model/usuario.php");
			require_once("model/archivos.php");
			$obj = new Usuario();
			$arch= new Archivos();
			$id=$_SESSION['idUsuario'];
			$datos=$obj-> getUserById($id);
			
			if(!empty($datos[0]['apellidoPatUsuario'])&&!empty($datos[0]['apellidoMatUsuario'])&&!empty($datos[0]['direccionUsuario'])&&!empty($datos[0]['numTelefonoUsuario'])){
				if (!empty($datos[0]['numCuenta'])&&!empty($datos[0]['bancoAfiliado'])&&!empty($datos[0]['folioFiscal'])&&!empty($datos[0]['rfc'])){
					$url=$arch->getUserById();
					foreach($url as $key){
						if($key['idDocumentosPersonal']==$_SESSION['usuario']){
							$enlace=substr($key['urlArchivo'], 3);
						}	
					}

					$total_pdf = count(glob($enlace."/{*.pdf}",GLOB_BRACE));
					if ($total_pdf==3){
						$obj->updateInfoC($id,1);
					}else {echo "falta documentos";}




				}else{
					echo "falta informacion bancaria";
				}
			}else{echo "falta informacion personal";}*/
				require_once("model/procedimiento.php");
 $obj=new procedimiento();
 $datos=$obj->getListProcedimiento();
 $numM1=0;
$numM2=0;
		if($_SESSION['rolUsuario']==3){
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
 }
$count = count($lista1);
$count2=count($lista2);

?>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Medico</td>
        <td>Paciente</td>
        <td>Siniestro</td>
        <td>Fecha</td>
        <td>Rolmedico</td>
        <td>Honorarios</td>
        <td>Status</td>
        <td>Caso Medico</td>
    </tr>

    <?php
for ($i = 0; $i < $count; $i++) {?>
	<tr>
                <td><?php echo $lista1[$i]["Usuario_idUsuario"]?></td>
                <td><?php echo $lista1[$i]["Paciente_idPaciente"]?></td>
                <td><?php echo $lista1[$i]["siniestro"]?></td>
                <td><?php echo $lista1[$i]["fechaCasoMedico"]?></td>
                <td><?php echo $lista1[$i]["rolMedicoEnCaso"]?></td>
                <td><?php echo $lista1[$i]["honorariosMedico"]?></td>
                <td><?php echo $lista1[$i]['status']?></td>
                <td><?php echo $lista1[$i]['idCasoMedico'];?></td>
            </tr>
<?php
}
for ($i = 0; $i < $count2; $i++) {?>
	<tr>
                <td><?php echo $lista2[$i]["Usuario_idUsuario"]?></td>
                <td><?php echo $lista2[$i]["Paciente_idPaciente"]?></td>
                <td><?php echo $lista2[$i]["siniestro"]?></td>
                <td><?php echo $lista2[$i]["fechaCasoMedico"]?></td>
                <td><?php echo $lista2[$i]["rolMedicoEnCaso"]?></td>
                <td><?php echo $lista2[$i]["honorariosMedico"]?></td>
                <td><?php echo $lista2[$i]['status']?></td>
                <td><?php echo $lista2[$i]['idCasoMedico'];?></td>
            </tr>
<?php
}
?>

</table>

		</div>





	</div><!-- .animated -->
</div><!-- .content -->


