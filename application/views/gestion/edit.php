<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Modificar Gesti&oacute;n</h3>
            </div>
            <?php echo form_open('gestion/edit/'.$gestion['gestion_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="gestion_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="gestion_nombre" value="<?php echo ($this->input->post('gestion_nombre') ? $this->input->post('gestion_nombre') : $gestion['gestion_nombre']); ?>" class="form-control" id="gestion_nombre" autocomplete="off" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('gestion_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_inicio" class="control-label"><span class="text-danger">*</span>Inicio</label>
                            <div class="form-group">
                                <input type="date" name="gestion_inicio" value="<?php echo ($this->input->post('gestion_inicio') ? $this->input->post('gestion_inicio') : $gestion['gestion_inicio']); ?>" class="form-control" id="gestion_inicio" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_fin" class="control-label">Fin</label>
                            <div class="form-group">
                                <input type="date" name="gestion_fin" value="<?php echo ($this->input->post('gestion_fin') ? $this->input->post('gestion_fin') : $gestion['gestion_fin']); ?>" class="form-control" id="gestion_fin" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_numingreso" class="control-label">Num. Ingresos</label>
                            <div class="form-group">
                                <input type="integer" name="gestion_numingreso" value="<?php echo ($this->input->post('gestion_numingreso') ? $this->input->post('gestion_numingreso') : $gestion['gestion_numingreso']); ?>" class="form-control" id="gestion_numingreso" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_numegreso" class="control-label">Num. Egresos</label>
                            <div class="form-group">
                                <input type="integer" name="gestion_numegreso" value="<?php echo ($this->input->post('gestion_numegreso') ? $this->input->post('gestion_numegreso') : $gestion['gestion_numegreso']); ?>" class="form-control" id="gestion_numegreso" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_id" class="form-control">
                                    <!--<option value="">select estado</option>-->
                                    <?php 
                                    foreach($all_estado as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $gestion['estado_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('gestion'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>