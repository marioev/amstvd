<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nuevo Asociado</h3>
            </div>
            <?php echo form_open_multipart('asociado/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="sociado_apellido" class="control-label"><span class="text-danger">*</span>Apellido(s)</label>
                            <div class="form-group">
                                <input type="text" name="sociado_apellido" value="<?php echo $this->input->post('sociado_apellido'); ?>" class="form-control" id="sociado_apellido" autofocus required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado__nombre" class="control-label"><span class="text-danger">*</span>Nombre(s)</label>
                            <div class="form-group">
                                <input type="text" name="asociado__nombre" value="<?php echo $this->input->post('asociado__nombre'); ?>" class="form-control" id="asociado__nombre" required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('asociado__nombre');?></span>
                            </div>
                        </div>
                        
					<div class="col-md-4">
						<label for="estadocivil_id" class="control-label">Estado Civil</label>
						<div class="form-group">
							<select name="estadocivil_id" class="form-control">
								<option value="">select estado_civil</option>
								<?php 
								foreach($all_estado_civil as $estado_civil)
								{
									$selected = ($estado_civil['estadocivil_id'] == $this->input->post('estadocivil_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="expedido_id" class="control-label">Expedido</label>
						<div class="form-group">
							<select name="expedido_id" class="form-control">
								<option value="">select expedido</option>
								<?php 
								foreach($all_expedido as $expedido)
								{
									$selected = ($expedido['expedido_id'] == $this->input->post('expedido_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$expedido['expedido_id'].'" '.$selected.'>'.$expedido['expedido_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="genero_id" class="control-label">Genero</label>
						<div class="form-group">
							<select name="genero_id" class="form-control">
								<option value="">select genero</option>
								<?php 
								foreach($all_genero as $genero)
								{
									$selected = ($genero['genero_id'] == $this->input->post('genero_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="asociado_fechanac" class="control-label">Asociado Fechanac</label>
						<div class="form-group">
							<input type="text" name="asociado_fechanac" value="<?php echo $this->input->post('asociado_fechanac'); ?>" class="has-datepicker form-control" id="asociado_fechanac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_ci" class="control-label">Asociado Ci</label>
						<div class="form-group">
							<input type="text" name="asociado_ci" value="<?php echo $this->input->post('asociado_ci'); ?>" class="form-control" id="asociado_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_ciext" class="control-label">Asociado Ciext</label>
						<div class="form-group">
							<input type="text" name="asociado_ciext" value="<?php echo $this->input->post('asociado_ciext'); ?>" class="form-control" id="asociado_ciext" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_codigo" class="control-label">Asociado Codigo</label>
						<div class="form-group">
							<input type="text" name="asociado_codigo" value="<?php echo $this->input->post('asociado_codigo'); ?>" class="form-control" id="asociado_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_direccion" class="control-label">Asociado Direccion</label>
						<div class="form-group">
							<input type="text" name="asociado_direccion" value="<?php echo $this->input->post('asociado_direccion'); ?>" class="form-control" id="asociado_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_telefono" class="control-label">Asociado Telefono</label>
						<div class="form-group">
							<input type="text" name="asociado_telefono" value="<?php echo $this->input->post('asociado_telefono'); ?>" class="form-control" id="asociado_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_celular" class="control-label">Asociado Celular</label>
						<div class="form-group">
							<input type="text" name="asociado_celular" value="<?php echo $this->input->post('asociado_celular'); ?>" class="form-control" id="asociado_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_foto" class="control-label">Asociado Foto</label>
						<div class="form-group">
							<input type="text" name="asociado_foto" value="<?php echo $this->input->post('asociado_foto'); ?>" class="form-control" id="asociado_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_email" class="control-label">Asociado Email</label>
						<div class="form-group">
							<input type="text" name="asociado_email" value="<?php echo $this->input->post('asociado_email'); ?>" class="form-control" id="asociado_email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_login" class="control-label">Asociado Login</label>
						<div class="form-group">
							<input type="text" name="asociado_login" value="<?php echo $this->input->post('asociado_login'); ?>" class="form-control" id="asociado_login" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_clave" class="control-label">Asociado Clave</label>
						<div class="form-group">
							<input type="text" name="asociado_clave" value="<?php echo $this->input->post('asociado_clave'); ?>" class="form-control" id="asociado_clave" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asocadio_codactivacion" class="control-label">Asocadio Codactivacion</label>
						<div class="form-group">
							<input type="text" name="asocadio_codactivacion" value="<?php echo $this->input->post('asocadio_codactivacion'); ?>" class="form-control" id="asocadio_codactivacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asociado_fechactivacion" class="control-label">Asociado Fechactivacion</label>
						<div class="form-group">
							<input type="text" name="asociado_fechactivacion" value="<?php echo $this->input->post('asociado_fechactivacion'); ?>" class="has-datetimepicker form-control" id="asociado_fechactivacion" />
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