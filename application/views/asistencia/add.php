<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Asistencia Add</h3>
            </div>
            <?php echo form_open('asistencia/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="reunion_id" class="control-label">Reunion</label>
						<div class="form-group">
							<select name="reunion_id" class="form-control">
								<option value="">select reunion</option>
								<?php 
								foreach($all_reunion as $reunion)
								{
									$selected = ($reunion['reunion_id'] == $this->input->post('reunion_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$reunion['reunion_id'].'" '.$selected.'>'.$reunion['reunion_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_id" class="control-label">Asociado</label>
						<div class="form-group">
							<select name="asociado_id" class="form-control">
								<option value="">select asociado</option>
								<?php 
								foreach($all_asociado as $asociado)
								{
									$selected = ($asociado['asociado_id'] == $this->input->post('asociado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$asociado['asociado_id'].'" '.$selected.'>'.$asociado['asociado_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="asistenca_nombre" class="control-label"><span class="text-danger">*</span>Asistenca Nombre</label>
						<div class="form-group">
							<input type="text" name="asistenca_nombre" value="<?php echo $this->input->post('asistenca_nombre'); ?>" class="form-control" id="asistenca_nombre" />
							<span class="text-danger"><?php echo form_error('asistenca_nombre');?></span>
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