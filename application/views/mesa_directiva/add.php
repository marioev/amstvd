<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Mesa Directiva Add</h3>
            </div>
            <?php echo form_open('mesa_directiva/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
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
						<label for="gestion_id" class="control-label">Gestion</label>
						<div class="form-group">
							<select name="gestion_id" class="form-control">
								<option value="">select gestion</option>
								<?php 
								foreach($all_gestion as $gestion)
								{
									$selected = ($gestion['gestion_id'] == $this->input->post('gestion_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
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
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mesadir_nombreasoc" class="control-label">Mesadir Nombreasoc</label>
						<div class="form-group">
							<input type="text" name="mesadir_nombreasoc" value="<?php echo $this->input->post('mesadir_nombreasoc'); ?>" class="form-control" id="mesadir_nombreasoc" />
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