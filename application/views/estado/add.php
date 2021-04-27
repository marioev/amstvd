<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Estado</h3>
            </div>
            <?php echo form_open('estado/add'); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="estado_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="estado_nombre" value="<?php echo $this->input->post('estado_nombre'); ?>" class="form-control" id="estado_nombre" autofocus autocomplete="off" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('estado_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="estado_color" class="control-label"><span class="text-danger">*</span>Color</label>
                            <div class="form-group">
                                <input type="color" name="estado_color" value="<?php echo $this->input->post('estado_color'); ?>" class="form-control" id="estado_color" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="estado_tipo" class="control-label"><span class="text-danger">*</span>Tipo</label>
                            <div class="form-group">
                                <input type="number" min="0" name="estado_tipo" value="<?php echo $this->input->post('estado_tipo'); ?>" class="form-control" id="estado_tipo" required />
                            </div>
                        </div>
                    </div>
			</div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('estado'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>