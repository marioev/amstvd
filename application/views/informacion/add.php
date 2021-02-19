<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Informacion Add</h3>
            </div>
            <?php echo form_open('informacion/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="organ_id" class="control-label">Organizacion</label>
						<div class="form-group">
							<select name="organ_id" class="form-control">
								<option value="">select organizacion</option>
								<?php 
								foreach($all_organizacion as $organizacion)
								{
									$selected = ($organizacion['organ_id'] == $this->input->post('organ_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$organizacion['organ_id'].'" '.$selected.'>'.$organizacion['organ_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="informacion_titulo" class="control-label"><span class="text-danger">*</span>Informacion Titulo</label>
						<div class="form-group">
							<input type="text" name="informacion_titulo" value="<?php echo $this->input->post('informacion_titulo'); ?>" class="form-control" id="informacion_titulo" />
							<span class="text-danger"><?php echo form_error('informacion_titulo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="informacion_fecha" class="control-label">Informacion Fecha</label>
						<div class="form-group">
							<input type="text" name="informacion_fecha" value="<?php echo $this->input->post('informacion_fecha'); ?>" class="has-datetimepicker form-control" id="informacion_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="informacion_contenido" class="control-label">Informacion Contenido</label>
						<div class="form-group">
							<textarea name="informacion_contenido" class="form-control" id="informacion_contenido"><?php echo $this->input->post('informacion_contenido'); ?></textarea>
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