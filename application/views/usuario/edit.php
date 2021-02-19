<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Usuario Edit</h3>
            </div>
			<?php echo form_open('usuario/edit/'.$usuario['usuario_id']); ?>
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
									$selected = ($estado['estado_id'] == $usuario['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipousuario_id" class="control-label">Tipo Usuario</label>
						<div class="form-group">
							<select name="tipousuario_id" class="form-control">
								<option value="">select tipo_usuario</option>
								<?php 
								foreach($all_tipo_usuario as $tipo_usuario)
								{
									$selected = ($tipo_usuario['tipousuario_id'] == $usuario['tipousuario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_usuario['tipousuario_id'].'" '.$selected.'>'.$tipo_usuario['tipousuario_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_nombre" class="control-label"><span class="text-danger">*</span>Usuario Nombre</label>
						<div class="form-group">
							<input type="text" name="usuario_nombre" value="<?php echo ($this->input->post('usuario_nombre') ? $this->input->post('usuario_nombre') : $usuario['usuario_nombre']); ?>" class="form-control" id="usuario_nombre" />
							<span class="text-danger"><?php echo form_error('usuario_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_email" class="control-label">Usuario Email</label>
						<div class="form-group">
							<input type="text" name="usuario_email" value="<?php echo ($this->input->post('usuario_email') ? $this->input->post('usuario_email') : $usuario['usuario_email']); ?>" class="form-control" id="usuario_email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_login" class="control-label">Usuario Login</label>
						<div class="form-group">
							<input type="text" name="usuario_login" value="<?php echo ($this->input->post('usuario_login') ? $this->input->post('usuario_login') : $usuario['usuario_login']); ?>" class="form-control" id="usuario_login" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_clave" class="control-label">Usuario Clave</label>
						<div class="form-group">
							<input type="text" name="usuario_clave" value="<?php echo ($this->input->post('usuario_clave') ? $this->input->post('usuario_clave') : $usuario['usuario_clave']); ?>" class="form-control" id="usuario_clave" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_imagen" class="control-label">Usuario Imagen</label>
						<div class="form-group">
							<input type="text" name="usuario_imagen" value="<?php echo ($this->input->post('usuario_imagen') ? $this->input->post('usuario_imagen') : $usuario['usuario_imagen']); ?>" class="form-control" id="usuario_imagen" />
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