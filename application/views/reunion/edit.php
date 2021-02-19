<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Reunion Edit</h3>
            </div>
			<?php echo form_open('reunion/edit/'.$reunion['reunion_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tiporeunion_id" class="control-label">Tipo Reunion</label>
						<div class="form-group">
							<select name="tiporeunion_id" class="form-control">
								<option value="">select tipo_reunion</option>
								<?php 
								foreach($all_tipo_reunion as $tipo_reunion)
								{
									$selected = ($tipo_reunion['tiporeunion_id'] == $reunion['tiporeunion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_reunion['tiporeunion_id'].'" '.$selected.'>'.$tipo_reunion['tiporeunion_id'].'</option>';
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
									$selected = ($estado['estado_id'] == $reunion['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_id'].'</option>';
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
									$selected = ($gestion['gestion_id'] == $reunion['gestion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="reunion_fechahora" class="control-label">Reunion Fechahora</label>
						<div class="form-group">
							<input type="text" name="reunion_fechahora" value="<?php echo ($this->input->post('reunion_fechahora') ? $this->input->post('reunion_fechahora') : $reunion['reunion_fechahora']); ?>" class="has-datetimepicker form-control" id="reunion_fechahora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reunion_inicio" class="control-label">Reunion Inicio</label>
						<div class="form-group">
							<input type="text" name="reunion_inicio" value="<?php echo ($this->input->post('reunion_inicio') ? $this->input->post('reunion_inicio') : $reunion['reunion_inicio']); ?>" class="form-control" id="reunion_inicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reunion_fin" class="control-label">Reunion Fin</label>
						<div class="form-group">
							<input type="text" name="reunion_fin" value="<?php echo ($this->input->post('reunion_fin') ? $this->input->post('reunion_fin') : $reunion['reunion_fin']); ?>" class="form-control" id="reunion_fin" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reunion_tolerancia" class="control-label">Reunion Tolerancia</label>
						<div class="form-group">
							<input type="text" name="reunion_tolerancia" value="<?php echo ($this->input->post('reunion_tolerancia') ? $this->input->post('reunion_tolerancia') : $reunion['reunion_tolerancia']); ?>" class="form-control" id="reunion_tolerancia" />
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