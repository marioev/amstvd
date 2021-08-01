<script src="<?php echo base_url('resources/js/reunion.js'); ?>" type="text/javascript"></script>
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
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Reuniones</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('reunion/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Reunión</a>
                </div>
            </div>
        </div>
        Registros Encontrados: <span id="numeroreg"></span>
    </section>
</div>
<div class="row col-md-12">
    <div class="col-md-6">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese tipo de reunión..." autocomplete="off" autofocus onkeypress="buscar_reunion(event)">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select name="gestion_id" class="form-control btn btn-dark btn-sm btn-block" id="gestion_id" onchange="tabla_reunion()">
                <option value="" disabled selected >-- BUSCAR POR GESTION --</option>
                <option value="0"> Todas Las Gestiones </option>
                <?php 
                foreach($all_gestion as $gestion)
                {
                    $selected = ($gestion["gestion_id"] == $estagestion_id) ? ' selected="selected"' : "";
                    echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_nombre'].'</option>';
                } 
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select name="tiporeunion_id" class="form-control btn btn-dark btn-sm btn-block" id="tiporeunion_id" onchange="tabla_reunion()">
                <option value="" disabled selected >-- BUSCAR POR TIPO DE REUNION --</option>
                <option value="0" selected> Todos los Tipos de Reuniones</option>
                <?php 
                foreach($all_tipo_reunion as $tiporeunion)
                {
                    echo '<option value="'.$tiporeunion['tiporeunion_id'].'">'.$tiporeunion['tiporeunion_nombre'].'</option>';
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
                        <th>Reuni&oacute;n</th>
                        <th>Gesti&oacute;n</th>
                        <th>Fecha</th>
                        <th>Inicio</th>
                        <th>Tolerancia(Min.)</th>
                        <th>Fin</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="listareuniones"></tbody>
                    <?php /*foreach($reunion as $r){ ?>
                    <tr>
                        <td><?php echo $r['reunion_id']; ?></td>
                        <td><?php echo $r['tiporeunion_id']; ?></td>
                        <td><?php echo $r['estado_id']; ?></td>
                        <td><?php echo $r['gestion_id']; ?></td>
                        <td><?php echo $r['reunion_fechahora']; ?></td>
                        <td><?php echo $r['reunion_inicio']; ?></td>
                        <td><?php echo $r['reunion_fin']; ?></td>
                        <td><?php echo $r['reunion_tolerancia']; ?></td>
                        <td>
                            <a href="<?php echo site_url('reunion/edit/'.$r['reunion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('reunion/remove/'.$r['reunion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php }*/ ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
