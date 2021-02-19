<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Usuario Edit</h3>
            </div>
			<?php echo form_open('tipo_usuario/edit/'.$tipo_usuario['tipousuario_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipousuario_nombre" class="control-label"><span class="text-danger">*</span>Tipousuario Nombre</label>
						<div class="form-group">
							<input type="text" name="tipousuario_nombre" value="<?php echo ($this->input->post('tipousuario_nombre') ? $this->input->post('tipousuario_nombre') : $tipo_usuario['tipousuario_nombre']); ?>" class="form-control" id="tipousuario_nombre" />
							<span class="text-danger"><?php echo form_error('tipousuario_nombre');?></span>
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