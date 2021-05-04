<script src="<?php echo base_url('resources/js/jquery.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#asociado_ci").change(function(){
            var ci = $("#asociado_ci").val();
            $('#asociado_codigo').val(ci);
            $('#asociado_login').val(ci);
            $('#asociado_clave').val(ci);
        });
    });
    function loader() {
     	$("form").submit(function() {
            document.getElementById('loader').style.display = 'block'; //ocultar el bloque del loader 
        });
    }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nuevo Asociado</h3>
            </div>
            <?php echo form_open_multipart('asociado/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class=" col-md-12" id='loader' style='display:none; text-align: center'>
                            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
                        </div>
                        <div class="col-md-4">
                            <label for="sociado_apellido" class="control-label"><span class="text-danger">*</span>Apellido(s)</label>
                            <div class="form-group">
                                <input type="text" name="sociado_apellido" value="<?php echo $this->input->post('sociado_apellido'); ?>" class="form-control" id="sociado_apellido" autofocus required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('sociado_apellido');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado_nombre" class="control-label"><span class="text-danger">*</span>Nombre(s)</label>
                            <div class="form-group">
                                <input type="text" name="asociado_nombre" value="<?php echo $this->input->post('asociado_nombre'); ?>" class="form-control" id="asociado__nombre" required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('asociado_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="estadocivil_id" class="control-label">Estado Civil</label>
                            <div class="form-group">
                                <select name="estadocivil_id" class="form-control">
                                    <!--<option value="">select estado_civil</option>-->
                                    <?php 
                                    foreach($all_estado_civil as $estado_civil)
                                    {
                                        $selected = ($estado_civil['estadocivil_id'] == $this->input->post('estadocivil_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado_ci" class="control-label"><span class="text-danger">*</span>C.I.</label>
                            <div class="form-group">
                                <input type="text" name="asociado_ci" value="<?php echo $this->input->post('asociado_ci'); ?>" class="form-control" id="asociado_ci" required autocomplete="off" />
                                <span class="text-danger"><?php echo form_error('asociado_ci');?></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="expedido_id" class="control-label">Expedido</label>
                            <div class="form-group">
                                <select name="expedido_id" class="form-control">
                                    <!--<option value="">select expedido</option>-->
                                    <?php 
                                    foreach($all_expedido as $expedido)
                                    {
                                        $selected = ($expedido['expedido_id'] == $this->input->post('expedido_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$expedido['expedido_id'].'" '.$selected.'>'.$expedido['expedido_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="genero_id" class="control-label">G&eacute;nero</label>
                            <div class="form-group">
                                <select name="genero_id" class="form-control">
                                    <!--<option value="">select genero</option>-->
                                    <?php 
                                    foreach($all_genero as $genero)
                                    {
                                        $selected = ($genero['genero_id'] == $this->input->post('genero_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado_fechanac" class="control-label">Fecha de Nacimiento</label>
                            <div class="form-group">
                                <?php
                                $fecha_actual = date("Y-m-d");
                                $nuevafecha = strtotime ('-20 year' , strtotime($fecha_actual));
                                ?>
                                <input type="date" name="asociado_fechanac" value="<?php echo ($this->input->post('asociado_fechanac') ? $this->input->post('asociado_fechanac') : date('Y-m-d', $nuevafecha)); ?>" class="form-control" id="asociado_fechanac" />
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                            <label for="asociado_ciext" class="control-label">Asociado Ciext</label>
                            <div class="form-group">
                                <input type="text" name="asociado_ciext" value="<?php //echo $this->input->post('asociado_ciext'); ?>" class="form-control" id="asociado_ciext" />
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <label for="asociado_codigo" class="control-label">C&oacute;digo</label>
                            <div class="form-group">
                                <input type="text" name="asociado_codigo" value="<?php echo $this->input->post('asociado_codigo'); ?>" class="form-control" id="asociado_codigo" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="asociado_direccion" class="control-label">Direcci&oacute;n</label>
                            <div class="form-group">
                                <input type="text" name="asociado_direccion" value="<?php echo $this->input->post('asociado_direccion'); ?>" class="form-control" id="asociado_direccion"  autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="asociado_telefono" class="control-label">Tel&eacute;fono</label>
                            <div class="form-group">
                                <input type="text" name="asociado_telefono" value="<?php echo $this->input->post('asociado_telefono'); ?>" class="form-control" id="asociado_telefono" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="asociado_celular" class="control-label">Celular</label>
                            <div class="form-group">
                                    <input type="text" name="asociado_celular" value="<?php echo $this->input->post('asociado_celular'); ?>" class="form-control" id="asociado_celular" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="asociado_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                <input type="file" name="asociado_foto" value="<?php echo $this->input->post('asociado_foto'); ?>" class="form-control btn-success" id="asociado_foto" accept="image/png, image/jpeg, image/jpg, image/gif, image/bmp" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado_email" class="control-label">Correo Electr&oacute;nico</label>
                            <div class="form-group">
                                <input type="email" name="asociado_email" value="<?php echo $this->input->post('asociado_email'); ?>" class="form-control" id="asociado_email" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado_login" class="control-label"><span class="text-danger">*</span>Usuario (Acceso)</label>
                            <div class="form-group">
                                <input type="text" name="asociado_login" value="<?php echo $this->input->post('asociado_login'); ?>" class="form-control" id="asociado_login" required autocomplete="off" />
                                <span class="text-danger"><?php echo form_error('asociado_login');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado_clave" class="control-label"><span class="text-danger">*</span>Contraseña (Acceso)</label>
                            <div class="form-group">
                                <input type="password" name="asociado_clave" value="<?php echo $this->input->post('asociado_clave'); ?>" class="form-control" id="asociado_clave" required autocomplete="off" />
                                <span class="text-danger"><?php echo form_error('asociado_clave');?></span>
                            </div>
                        </div>
                        <!--<div class="col-md-4">
                            <label for="asocadio_codactivacion" class="control-label">Asocadio Codactivacion</label>
                            <div class="form-group">
                                <input type="text" name="asocadio_codactivacion" value="<?php echo $this->input->post('asocadio_codactivacion'); ?>" class="form-control" id="asocadio_codactivacion" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asociado_fechactivacion" class="control-label">Asociado Fechactivacion</label>
                            <div class="form-group">
                                <input type="text" name="asociado_fechactivacion" value="<?php echo $this->input->post('asociado_fechactivacion'); ?>" class="has-datetimepicker form-control" id="asociado_fechactivacion" />
                            </div>
                        </div>--->
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success" onclick="loader()">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('asociado'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>