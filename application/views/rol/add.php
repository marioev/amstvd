<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nuevo Rol</h3>
            </div>
            <?php echo form_open('rol/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="rol_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="rol_nombre"  class="form-control" id="rol_nombre" autofocus autocomplete="off" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('rol_nombre');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="rol_idfk" class="control-label">Rol Superior</label>
                        <div class="form-group">
                            <select name="rol_idfk" class="form-control" id="rol_idfk" required>
                                <option value="0">SIN ROL SUPERIOR</option>
                                <?php 
                                foreach($all_rolpadre as $rolpadre)
                                {
                                    $selected = ($rolpadre['rol_id'] == $this->input->post('rol_idfk')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$rolpadre['rol_id'].'" '.$selected.'>'.$rolpadre['rol_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="rol_descripcion" class="control-label">Descripción</label>
                        <div class="form-group">
                            <input type="text" name="rol_descripcion"  class="form-control" id="rol_descripcion" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
            	</button>
                <a href="<?php echo site_url('rol'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>