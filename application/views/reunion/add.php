<script src="<?php echo base_url('resources/js/reunion_add.js'); ?>" type="text/javascript"></script>
<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Nueva Reuni&oacute;n</h3>
            </div>
            <?php echo form_open('reunion/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="tiporeunion_id" class="control-label"><span class="text-danger">*</span>Reuni&oacute;n</label>
                            <div class="form-group" style="display: flex">
                                <select name="tiporeunion_id" id="tiporeunion_id" class="form-control" required>
                                    <!--<option value="">select tipo_reunion</option>-->
                                    <?php 
                                    foreach($all_tipo_reunion as $tipo_reunion)
                                    {
                                        $selected = ($tipo_reunion['tiporeunion_id'] == $this->input->post('tiporeunion_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$tipo_reunion['tiporeunion_id'].'" '.$selected.'>'.$tipo_reunion['tiporeunion_nombre'].'</option>';
                                    }
                                    ?>
                                </select>
                                <a data-toggle="modal" data-target="#modaltiporeunion" class="btn btn-warning" title="Registrar nuevo tipo de reunión">
                                <i class="fa fa-plus-circle"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="gestion_id" class="control-label"><span class="text-danger">*</span>Gesti&oacute;n</label>
                            <div class="form-group">
                                <select name="gestion_id" id="gestion_id" class="form-control" required>
                                    <!--<option value="">select gestion</option>-->
                                    <?php 
                                    foreach($all_gestion as $gestion)
                                    {
                                        $selected = ($gestion['gestion_id'] == $this->input->post('gestion_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="reunion_fecha" class="control-label"><span class="text-danger">*</span>Fecha</label>
                            <div class="form-group">
                                <input type="date" name="reunion_fecha" id="reunion_fecha" value="<?php echo date('Y-m-d'); ?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="reunion_inicio" class="control-label">Inicio reuni&oacute;n</label>
                            <div class="form-group">
                                <input type="time" step="any" name="reunion_inicio" value="<?php echo date('H:i:s'); ?>" class="form-control" id="reunion_inicio" />
                            </div>
                        </div>
                        <!--<div class="col-md-3">
                            <label for="reunion_fin" class="control-label">Fin Reuni&oacute;n</label>
                            <div class="form-group">
                                <input type="time" step="any" name="reunion_fin" value="<?php //echo $this->input->post('reunion_fin'); ?>" class="form-control" id="reunion_fin" />
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <label for="reunion_tolerancia" class="control-label">Tolerancia(Minutos)</label>
                            <div class="form-group">
                                <input type="number" name="reunion_tolerancia" value="<?php echo ($this->input->post('reunion_tolerancia') ? $this->input->post('reunion_tolerancia') : "0"); ?>" class="form-control" id="reunion_tolerancia" />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
                    <a href="<?php echo site_url('reunion'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i>Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<!------------------------ INICIO modal para Registrar nuevo Tipo de Reunion ------------------->
<div class="modal fade" id="modaltiporeunion" tabindex="-1" role="dialog" aria-labelledby="modaltiporeunionlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="display: inline">
                <span class="text-bold">TIPO DE REUNION</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
               <div class="col-md-12">
                   <label for="nuevo_tiporeunion" class="control-label"><span class="text-danger">*</span>Nuevo Tipo de Reuni&oacute;n</label>
                   <span class="text-danger" id="mensaje_tiporeunion"></span>
                    <div class="form-group">
                        <input type="text" name="nuevo_tiporeunion"  class="form-control" id="nuevo_tiporeunion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer text-center" style="display: inline">
                <a onclick="registrarnuevotiporeunion()" class="btn btn-success"><span class="fa fa-check"></span> Registrar </a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nuevo Tipo de Reunion ------------------->