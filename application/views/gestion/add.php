<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Añadir Gesti&oacute;n</h3>
            </div>
            <?php echo form_open('gestion/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="gestion_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="gestion_nombre" value="<?php echo $this->input->post('gestion_nombre'); ?>" class="form-control" id="gestion_nombre" autofocus autocomplete="off" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('gestion_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_inicio" class="control-label"><span class="text-danger">*</span>Inicio</label>
                            <div class="form-group">
                                <input type="date" name="gestion_inicio" value="<?php echo ($this->input->post('gestion_inicio') ? $this->input->post('gestion_inicio') : date('Y-m-d')); ?>" class=" form-control" id="gestion_inicio" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_fin" class="control-label">Fin</label>
                            <div class="form-group">
                                <input type="date" name="gestion_fin" value="<?php echo ($this->input->post('gestion_fin') ? $this->input->post('gestion_fin') : date('Y-m-d')); ?>" class=" form-control" id="gestion_fin" />
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                            <label for="gestion_numingreso" class="control-label">Gestion Numingreso</label>
                            <div class="form-group">
                                <input type="text" name="gestion_numingreso" value="<?php //echo $this->input->post('gestion_numingreso'); ?>" class="form-control" id="gestion_numingreso" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="gestion_numegreso" class="control-label">Gestion Numegreso</label>
                            <div class="form-group">
                                <input type="text" name="gestion_numegreso" value="<?php //echo $this->input->post('gestion_numegreso'); ?>" class="form-control" id="gestion_numegreso" />
                            </div>
                        </div>-->
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