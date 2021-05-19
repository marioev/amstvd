<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Configuraci&oacute;n</h3>
            </div>
            <?php echo form_open_multipart('configuracion/add'); ?>
            <div class="box-body" style="margin-top: 0px;margin-bottom: 0px; background: rgba(255, 0, 0, 0.3);"><u><b>CONFIGURACION</b></u>
                <div class="col-md-7">
                    <label for="config_apikey" class="control-label">API KEY</label>
                    <div class="form-group">
                        <input type="text" name="config_apikey" value="<?php echo ($this->input->post('config_apikey') ? $this->input->post('config_apikey') : ""); ?>" class="form-control" id="config_apikey" />
                    </div>
                    <br>
                </div>
            </div>
            <hr>
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('configuracion'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>