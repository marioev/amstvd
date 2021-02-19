<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Gestion Edit</h3>
            </div>
			<?php echo form_open('gestion/edit/'.$gestion['gestion_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $gestion['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_nombre" class="control-label"><span class="text-danger">*</span>Gestion Nombre</label>
						<div class="form-group">
							<input type="text" name="gestion_nombre" value="<?php echo ($this->input->post('gestion_nombre') ? $this->input->post('gestion_nombre') : $gestion['gestion_nombre']); ?>" class="form-control" id="gestion_nombre" />
							<span class="text-danger"><?php echo form_error('gestion_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_inicio" class="control-label">Gestion Inicio</label>
						<div class="form-group">
							<input type="text" name="gestion_inicio" value="<?php echo ($this->input->post('gestion_inicio') ? $this->input->post('gestion_inicio') : $gestion['gestion_inicio']); ?>" class="has-datepicker form-control" id="gestion_inicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_fin" class="control-label">Gestion Fin</label>
						<div class="form-group">
							<input type="text" name="gestion_fin" value="<?php echo ($this->input->post('gestion_fin') ? $this->input->post('gestion_fin') : $gestion['gestion_fin']); ?>" class="has-datepicker form-control" id="gestion_fin" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_numingreso" class="control-label">Gestion Numingreso</label>
						<div class="form-group">
							<input type="text" name="gestion_numingreso" value="<?php echo ($this->input->post('gestion_numingreso') ? $this->input->post('gestion_numingreso') : $gestion['gestion_numingreso']); ?>" class="form-control" id="gestion_numingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_numegreso" class="control-label">Gestion Numegreso</label>
						<div class="form-group">
							<input type="text" name="gestion_numegreso" value="<?php echo ($this->input->post('gestion_numegreso') ? $this->input->post('gestion_numegreso') : $gestion['gestion_numegreso']); ?>" class="form-control" id="gestion_numegreso" />
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