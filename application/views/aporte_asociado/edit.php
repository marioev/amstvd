<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Aporte Edit</h3>
            </div>
			<?php echo form_open('aporte/edit/'.$aporte['aporte_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipoaporte_id" class="control-label">Tipo Aporte</label>
						<div class="form-group">
							<select name="tipoaporte_id" class="form-control">
								<option value="">select tipo_aporte</option>
								<?php 
								foreach($all_tipo_aporte as $tipo_aporte)
								{
									$selected = ($tipo_aporte['tipoaporte_id'] == $aporte['tipoaporte_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_aporte['tipoaporte_id'].'" '.$selected.'>'.$tipo_aporte['tipoaporte_id'].'</option>';
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
									$selected = ($gestion['gestion_id'] == $aporte['gestion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_id'].'</option>';
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
									$selected = ($estado['estado_id'] == $aporte['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="aporte_nombre" class="control-label"><span class="text-danger">*</span>Aporte Nombre</label>
						<div class="form-group">
							<input type="text" name="aporte_nombre" value="<?php echo ($this->input->post('aporte_nombre') ? $this->input->post('aporte_nombre') : $aporte['aporte_nombre']); ?>" class="form-control" id="aporte_nombre" />
							<span class="text-danger"><?php echo form_error('aporte_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="aporte_nombrepago" class="control-label">Aporte Nombrepago</label>
						<div class="form-group">
							<input type="text" name="aporte_nombrepago" value="<?php echo ($this->input->post('aporte_nombrepago') ? $this->input->post('aporte_nombrepago') : $aporte['aporte_nombrepago']); ?>" class="form-control" id="aporte_nombrepago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aporte_mes" class="control-label">Aporte Mes</label>
						<div class="form-group">
							<input type="text" name="aporte_mes" value="<?php echo ($this->input->post('aporte_mes') ? $this->input->post('aporte_mes') : $aporte['aporte_mes']); ?>" class="form-control" id="aporte_mes" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aporte_anio" class="control-label">Aporte Anio</label>
						<div class="form-group">
							<input type="text" name="aporte_anio" value="<?php echo ($this->input->post('aporte_anio') ? $this->input->post('aporte_anio') : $aporte['aporte_anio']); ?>" class="form-control" id="aporte_anio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aporte_monto" class="control-label">Aporte Monto</label>
						<div class="form-group">
							<input type="text" name="aporte_monto" value="<?php echo ($this->input->post('aporte_monto') ? $this->input->post('aporte_monto') : $aporte['aporte_monto']); ?>" class="form-control" id="aporte_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aporte_fechahora" class="control-label">Aporte Fechahora</label>
						<div class="form-group">
							<input type="text" name="aporte_fechahora" value="<?php echo ($this->input->post('aporte_fechahora') ? $this->input->post('aporte_fechahora') : $aporte['aporte_fechahora']); ?>" class="has-datetimepicker form-control" id="aporte_fechahora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aporte_obs" class="control-label">Aporte Obs</label>
						<div class="form-group">
							<input type="text" name="aporte_obs" value="<?php echo ($this->input->post('aporte_obs') ? $this->input->post('aporte_obs') : $aporte['aporte_obs']); ?>" class="form-control" id="aporte_obs" />
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