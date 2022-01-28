<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Tipo Multa</h3>
            </div>
            <?php echo form_open('tipo_multa/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="tipomulta_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="tipomulta_nombre" value="<?php echo $this->input->post('tipomulta_nombre'); ?>" class="form-control" id="tipomulta_nombre" autofocus autocomplete="off" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('tipomulta_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="tipomulta_monto" class="control-label"><span class="text-danger">*</span>Monto</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="tipomulta_monto" value="<?php echo ($this->input->post('tipomulta_monto') ? $this->input->post('tipomulta_monto') : 0); ?>" class="form-control" id="tipomulta_monto" required />
                                <span class="text-danger"><?php echo form_error('tipomulta_monto');?></span>
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('tipo_multa'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>