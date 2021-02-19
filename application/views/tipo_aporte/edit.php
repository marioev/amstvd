<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Aporte Edit</h3>
            </div>
			<?php echo form_open('tipo_aporte/edit/'.$tipo_aporte['tipoaporte_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipoaporte_nombre" class="control-label"><span class="text-danger">*</span>Tipoaporte Nombre</label>
						<div class="form-group">
							<input type="text" name="tipoaporte_nombre" value="<?php echo ($this->input->post('tipoaporte_nombre') ? $this->input->post('tipoaporte_nombre') : $tipo_aporte['tipoaporte_nombre']); ?>" class="form-control" id="tipoaporte_nombre" />
							<span class="text-danger"><?php echo form_error('tipoaporte_nombre');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>