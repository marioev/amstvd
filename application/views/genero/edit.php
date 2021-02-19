<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Genero Edit</h3>
            </div>
			<?php echo form_open('genero/edit/'.$genero['genero_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="genero_nombre" class="control-label"><span class="text-danger">*</span>Genero Nombre</label>
						<div class="form-group">
							<input type="text" name="genero_nombre" value="<?php echo ($this->input->post('genero_nombre') ? $this->input->post('genero_nombre') : $genero['genero_nombre']); ?>" class="form-control" id="genero_nombre" />
							<span class="text-danger"><?php echo form_error('genero_nombre');?></span>
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