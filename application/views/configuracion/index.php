<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Configuraci&oacute;n</h1>
                </div>
                <?php
                if(!isset($configuracion)){
                ?>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('configuracion/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Configuraci&oacute;n</a>
                </div>
                <?php } ?>
            </div>
    </section>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <?php
            if(isset($configuracion)){
            ?>
            <div class="box-header">
                <a href="<?php echo site_url('configuracion/edit/'.$configuracion['config_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modificar Configuraci&oacute;n</a>
            </div>
            <?php } ?>
            <div class="box-body table-responsive" >
                <table class="table table-striped table-condensed" id="mitabla" style="text-align: center; font-size: 11px;color:black;">
                    <tr>
                        <th style="font-size: 12px;color:black;background: rgba(255, 0, 0, 0.3);" rowspan="4" ><u>CONFIGURACION</u></th>
                        <th style="font-size: 11px;color:black;background: rgba(255, 0, 0, 0.3);">API KEY</th>
                    </tr>
                    <tr>
                        <td><?php echo substr($configuracion['config_apikey'],0,10)."..."; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
