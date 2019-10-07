
 <div class="row form-group">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">Paciente</label></div>
                            <div class="col-12 col-md-6">
                                <select name="selectPas" id="selectPas" class="form-control">
                                  <?php  
                                    require_once("../../model/paciente.php"); 
                                    $obj=new Paciente();
                                    $datos=$obj->getListPaciente();
                                    foreach ($datos as $key ) {
                                        ?>
                                        <option value="<?php echo $key['idPaciente']; ?>"><?php echo $key['nombrePaciente']; ?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
