<script src="<?php echo base_url('resources/js/aporte.js'); ?>" type="text/javascript"></script>
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
<!--<input type="hidden" id="elasociadoactual">
<input type="hidden" id="elasociadoactualci">-->
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Aportes</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('aporte/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Aporte</a>
                </div>
            </div>
        </div>
        Registros Encontrados: <span id="numeroreg"></span>
    </section>
</div>
<div class="row col-md-12">
    <div class="col-md-6">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese Nombre..." autocomplete="off" autofocus onkeypress="buscaraporte(event)">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select name="gestion_id" class="form-control btn btn-dark btn-sm btn-block" id="gestion_id" onchange="tabla_aporte()">
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
            <select name="tipoaporte_id" class="form-control btn btn-dark btn-sm btn-block" id="tipoaporte_id" onchange="tabla_aporte()">
                <option value="" disabled selected >-- BUSCAR POR TIPO APORTE --</option>
                <option value="0"> Todas Las Gestiones </option>
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
                        <th>Nombre</th>
                        <th>Gesti&oacute;n</th>
                        <th>Tipo de Aporte</th>
                        <th>Monto</th>
                        <th>Obs.</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="listaaportes"></tbody>
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
