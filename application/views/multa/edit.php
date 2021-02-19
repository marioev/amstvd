<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Multa Edit</h3>
            </div>
			<?php echo form_open('multa/edit/'.$multa['multa_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="asistencia_id" class="control-label">Asistencia</label>
						<div class="form-group">
							<select name="asistencia_id" class="form-control">
								<option value="">select asistencia</option>
								<?php 
								foreach($all_asistencia as $asistencia)
								{
									$selected = ($asistencia['asistencia_id'] == $multa['asistencia_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$asistencia['asistencia_id'].'" '.$selected.'>'.$asistencia['asistencia_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_socio" class="control-label">Multa Socio</label>
						<div class="form-group">
							<input type="text" name="multa_socio" value="<?php echo ($this->input->post('multa_socio') ? $this->input->post('multa_socio') : $multa['multa_socio']); ?>" class="form-control" id="multa_socio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_nombrepago" class="control-label">Multa Nombrepago</label>
						<div class="form-group">
							<input type="text" name="multa_nombrepago" value="<?php echo ($this->input->post('multa_nombrepago') ? $this->input->post('multa_nombrepago') : $multa['multa_nombrepago']); ?>" class="form-control" id="multa_nombrepago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_fecha" class="control-label">Multa Fecha</label>
						<div class="form-group">
							<input type="text" name="multa_fecha" value="<?php echo ($this->input->post('multa_fecha') ? $this->input->post('multa_fecha') : $multa['multa_fecha']); ?>" class="has-datepicker form-control" id="multa_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_monto" class="control-label">Multa Monto</label>
						<div class="form-group">
							<input type="text" name="multa_monto" value="<?php echo ($this->input->post('multa_monto') ? $this->input->post('multa_monto') : $multa['multa_monto']); ?>" class="form-control" id="multa_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_fechapago" class="control-label">Multa Fechapago</label>
						<div class="form-group">
							<input type="text" name="multa_fechapago" value="<?php echo ($this->input->post('multa_fechapago') ? $this->input->post('multa_fechapago') : $multa['multa_fechapago']); ?>" class="has-datetimepicker form-control" id="multa_fechapago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_obs" class="control-label">Multa Obs</label>
						<div class="form-group">
							<input type="text" name="multa_obs" value="<?php echo ($this->input->post('multa_obs') ? $this->input->post('multa_obs') : $multa['multa_obs']); ?>" class="form-control" id="multa_obs" />
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