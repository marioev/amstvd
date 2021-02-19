<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Expedido Add</h3>
            </div>
            <?php echo form_open('expedido/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="expedido_nombre" class="control-label"><span class="text-danger">*</span>Expedido Nombre</label>
						<div class="form-group">
							<input type="text" name="expedido_nombre" value="<?php echo $this->input->post('expedido_nombre'); ?>" class="form-control" id="expedido_nombre" />
							<span class="text-danger"><?php echo form_error('expedido_nombre');?></span>
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