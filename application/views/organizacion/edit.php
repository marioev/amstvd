<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Organizacion Edit</h3>
            </div>
			<?php echo form_open('organizacion/edit/'.$organizacion['organ_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="organ_nombre" class="control-label"><span class="text-danger">*</span>Organ Nombre</label>
						<div class="form-group">
							<input type="text" name="organ_nombre" value="<?php echo ($this->input->post('organ_nombre') ? $this->input->post('organ_nombre') : $organizacion['organ_nombre']); ?>" class="form-control" id="organ_nombre" />
							<span class="text-danger"><?php echo form_error('organ_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_slogan" class="control-label">Organ Slogan</label>
						<div class="form-group">
							<input type="text" name="organ_slogan" value="<?php echo ($this->input->post('organ_slogan') ? $this->input->post('organ_slogan') : $organizacion['organ_slogan']); ?>" class="form-control" id="organ_slogan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_direccion" class="control-label">Organ Direccion</label>
						<div class="form-group">
							<input type="text" name="organ_direccion" value="<?php echo ($this->input->post('organ_direccion') ? $this->input->post('organ_direccion') : $organizacion['organ_direccion']); ?>" class="form-control" id="organ_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_telefono" class="control-label">Organ Telefono</label>
						<div class="form-group">
							<input type="text" name="organ_telefono" value="<?php echo ($this->input->post('organ_telefono') ? $this->input->post('organ_telefono') : $organizacion['organ_telefono']); ?>" class="form-control" id="organ_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_imagen" class="control-label">Organ Imagen</label>
						<div class="form-group">
							<input type="text" name="organ_imagen" value="<?php echo ($this->input->post('organ_imagen') ? $this->input->post('organ_imagen') : $organizacion['organ_imagen']); ?>" class="form-control" id="organ_imagen" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_departamento" class="control-label">Organ Departamento</label>
						<div class="form-group">
							<input type="text" name="organ_departamento" value="<?php echo ($this->input->post('organ_departamento') ? $this->input->post('organ_departamento') : $organizacion['organ_departamento']); ?>" class="form-control" id="organ_departamento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_zona" class="control-label">Organ Zona</label>
						<div class="form-group">
							<input type="text" name="organ_zona" value="<?php echo ($this->input->post('organ_zona') ? $this->input->post('organ_zona') : $organizacion['organ_zona']); ?>" class="form-control" id="organ_zona" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_ubicacion" class="control-label">Organ Ubicacion</label>
						<div class="form-group">
							<input type="text" name="organ_ubicacion" value="<?php echo ($this->input->post('organ_ubicacion') ? $this->input->post('organ_ubicacion') : $organizacion['organ_ubicacion']); ?>" class="form-control" id="organ_ubicacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_email" class="control-label">Organ Email</label>
						<div class="form-group">
							<input type="text" name="organ_email" value="<?php echo ($this->input->post('organ_email') ? $this->input->post('organ_email') : $organizacion['organ_email']); ?>" class="form-control" id="organ_email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_latitud" class="control-label">Organ Latitud</label>
						<div class="form-group">
							<input type="text" name="organ_latitud" value="<?php echo ($this->input->post('organ_latitud') ? $this->input->post('organ_latitud') : $organizacion['organ_latitud']); ?>" class="form-control" id="organ_latitud" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organ_longitud" class="control-label">Organ Longitud</label>
						<div class="form-group">
							<input type="text" name="organ_longitud" value="<?php echo ($this->input->post('organ_longitud') ? $this->input->post('organ_longitud') : $organizacion['organ_longitud']); ?>" class="form-control" id="organ_longitud" />
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