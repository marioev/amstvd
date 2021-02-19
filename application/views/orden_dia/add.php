<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Orden Dia Add</h3>
            </div>
            <?php echo form_open('orden_dia/add'); ?>
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
						<label for="ordendia_nombre" class="control-label"><span class="text-danger">*</span>Ordendia Nombre</label>
						<div class="form-group">
							<input type="text" name="ordendia_nombre" value="<?php echo $this->input->post('ordendia_nombre'); ?>" class="form-control" id="ordendia_nombre" />
							<span class="text-danger"><?php echo form_error('ordendia_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ordendia_observacion" class="control-label">Ordendia Observacion</label>
						<div class="form-group">
							<input type="text" name="ordendia_observacion" value="<?php echo $this->input->post('ordendia_observacion'); ?>" class="form-control" id="ordendia_observacion" />
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