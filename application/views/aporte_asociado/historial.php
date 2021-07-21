<script src="<?php echo base_url('resources/js/aporte_historial.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<input type="hidden" id="asociado_id" name="asociado_id" value="<?php echo $asociado_id;?>">
<!--
<input type="hidden" id="elasociadoactualci">-->
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Historial de Aportes</h1>
                    <h1><?php echo $asociado["asociado_apellido"]." ".$asociado["asociado_nombre"]; ?></h1>
                </div>
            </div>
        </div>
        Registros Encontrados: <span id="numeroreg"></span>
    </section>
</div>
<div class="row col-md-12" style="padding-left: 0px">
    <div class="col-md-6">
        <div class="input-group no-print"> <span class="form-inline input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese Nombre, apellido, c.i...." autocomplete="off" autofocus onkeypress="buscaraporte(event)">
            <div style="border-color: #F50; background: #F50 !important; color: white" class="btn input-group-addon" onclick="tabla_aportehistorial()" title="Buscar"><span class="fa fa-search"></span></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select name="gestion_id" class="form-control btn btn-dark btn-sm btn-block" id="gestion_id" onchange="tabla_aportehistorial()">
                <option value="" disabled selected >-- BUSCAR POR GESTION --</option>
                <option value="0"> Todas Las Gestiones </option>
                <?php 
                foreach($all_gestion as $gestion)
                {
                    $selected = ($gestion["estado_id"] == 1) ? ' selected="selected"' : "";
                    echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_nombre'].'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select name="tipoaporte_id" class="form-control btn btn-dark btn-sm btn-block" id="tipoaporte_id" onchange="tabla_aportehistorial()">
                <option value="" disabled selected >-- BUSCAR POR TIPO APORTE --</option>
                <option value="0"> Todos los tipos de aporte </option>
                <?php 
                foreach($all_tipo_aporte as $tipoaporte)
                {
                    echo '<option value="'.$tipoaporte['tipoaporte_id'].'">'.$tipoaporte['tipoaporte_nombre'].'</option>';
                }
                ?>
            </select>
        </div>
    </div>
</div>
</div>
<div class="row col-md-12" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>N&deg;</th>
                        <th>Aporte</th>
                        <th>Recibo</th>
                        <th>Tipo</th>
                        <th>Gestion</th>
                        <th>Monto</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="listaaportes"></tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
