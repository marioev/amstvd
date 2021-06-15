<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nuevo Aporte</h3>
            </div>
            <?php echo form_open('aporte/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-5">
                            <label for="aporte_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="aporte_nombre" value="<?php echo $this->input->post('aporte_nombre'); ?>" class="form-control" id="aporte_nombre" autofocus autocomplete="off" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('aporte_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_id" class="control-label">Gesti&oacute;n</label>
                            <div class="form-group">
                                <select name="gestion_id" class="form-control" id="gestion_id" required>
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
                        <div class="col-md-4">
                            <label for="tipoaporte_id" class="control-label">Tipo de Aporte</label>
                            <div class="form-group">
                                <select name="tipoaporte_id" class="form-control" required>
                                    <!--<option value="">select tipo_aporte</option>-->
                                    <?php 
                                    foreach($all_tipo_aporte as $tipo_aporte)
                                    {
                                        $selected = ($tipo_aporte['tipoaporte_id'] == $this->input->post('tipoaporte_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$tipo_aporte['tipoaporte_id'].'" '.$selected.'>'.$tipo_aporte['tipoaporte_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="aporte_monto" class="control-label"><span class="text-danger">*</span>Monto</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="aporte_monto" value="<?php echo ($this->input->post('aporte_monto') ? $this->input->post('aporte_monto') : $configuracion['config_aporte']); ?>" class="form-control" id="aporte_monto" required />
                                <span class="text-danger"><?php echo form_error('aporte_monto');?></span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <label for="aporte_obs" class="control-label">Observaci&oacute;n</label>
                            <div class="form-group">
                                <input type="text" maxlength="250" name="aporte_obs" value="<?php echo $this->input->post('aporte_obs'); ?>" class="form-control" id="aporte_obs" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Generar Aporte
                    </button>
                    <a href="<?php echo site_url('aporte'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>