<script src="<?php echo base_url('resources/js/aporte_asociado.js'); ?>" type="text/javascript"></script>
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
<input type="hidden" id="elasociadoactual">
<!--
<input type="hidden" id="elasociadoactualci">-->
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Cobro de Aportes</h1>
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
            <div style="border-color: #F50; background: #F50 !important; color: white" class="btn input-group-addon" onclick="tabla_aporteasociado()" title="Buscar"><span class="fa fa-search"></span></div>
        </div>
    </div>
    <!--<div class="col-md-3">
        <div class="form-group">
            <select name="gestion_id" class="form-control btn btn-dark btn-sm btn-block" id="gestion_id" onchange="tabla_aporteasociado()">
                <option value="" disabled selected >-- BUSCAR POR GESTION --</option>
                <option value="0"> Todas Las Gestiones </option>
                <?php 
                /*foreach($all_gestion as $gestion)
                {
                    $selected = ($gestion["estado_id"] == 1) ? ' selected="selected"' : "";
                    echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_nombre'].'</option>';
                }*/
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select name="tipoaporte_id" class="form-control btn btn-dark btn-sm btn-block" id="tipoaporte_id" onchange="tabla_aporteasociado()">
                <option value="" disabled selected >-- BUSCAR POR TIPO APORTE --</option>
                <option value="0"> Todas Las Gestiones </option>
                <?php 
                /*foreach($all_tipo_aporte as $tipoaporte)
                {
                    echo '<option value="'.$tipoaporte['tipoaporte_id'].'">'.$tipoaporte['tipoaporte_nombre'].'</option>';
                }*/
                ?>
            </select>
        </div>
    </div>-->
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
                        <th>Apellido(s)</th>
                        <th>Nombre(s)</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="listaaporteasociados"></tbody>
                    <?php /*foreach($aporte as $a){ ?>
                    <tr>
						<td><?php echo $a['aporte_id']; ?></td>
						<td><?php echo $a['tipoaporte_id']; ?></td>
						<td><?php echo $a['gestion_id']; ?></td>
						<td><?php echo $a['estado_id']; ?></td>
						<td><?php echo $a['aporte_nombre']; ?></td>
						<td><?php echo $a['aporte_nombrepago']; ?></td>
						<td><?php echo $a['aporte_mes']; ?></td>
						<td><?php echo $a['aporte_anio']; ?></td>
						<td><?php echo $a['aporte_monto']; ?></td>
						<td><?php echo $a['aporte_fechahora']; ?></td>
						<td><?php echo $a['aporte_obs']; ?></td>
						<td>
                            <a href="<?php echo site_url('aporte/edit/'.$a['aporte_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('aporte/remove/'.$a['aporte_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php }*/ ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<!-------------------------- INICIO modal para restablecer acceso al ssitema de un asociado -------------------------->
<div class="modal fade" id="modalmostrardeuda" tabindex="-1" role="dialog" aria-labelledby="modalmodalmostrardeudalabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" id="elasociadonombre"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>N&deg;</th>
                        <th>Aporte</th>
                        <th>Tipo</th>
                        <th>Gesti&oacute;n</th>
                        <th>Moonto</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="listadedeudas"></tbody>
                </table>
            </div>
            <div class="modal-footer text-center d-block">
                <a class="btn btn-success" onclick="restableceringreso()" ><span class="fa fa-check"></span> Aceptar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!-------------------------- F I N  modal para restablecer acceso al ssitema de un asociado -------------------------->
