<script src="<?php echo base_url('resources/js/jquery.min.js'); ?>" type="text/javascript"></script>
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
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Gesti&oacute;n</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('gestion/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Gesti&oacute;n</a>
                </div>
            </div>

        </div> Registros Encontrados: <?php echo sizeof($gestion); ?>
    </section>
</div>
<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el Nombre">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>N&deg;</th>
                        <th>Nombre</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Num. Ingresos</th>
                        <th>Num. Egresos</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($gestion as $g){ ?>
                        <tr style="background: <?php echo $g['estado_color']; ?>">
                        <td class="text-center"><?php echo ($i+1); ?></td>
                        <td><?php echo $g['gestion_nombre']; ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($g['gestion_inicio'])); ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($g['gestion_fin'])); ?></td>
                        <td class="text-right"><?php echo $g['gestion_numingreso']; ?></td>
                        <td class="text-right"><?php echo $g['gestion_numegreso']; ?></td>
                        <td class="text-center"><?php echo $g['estado_nombre']; ?></td>
                        <td>
                            <a href="<?php echo site_url('gestion/edit/'.$g['gestion_id']); ?>" class="btn btn-info btn-xs" title="Modificar gestión"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('gestion/remove/'.$g['gestion_id']); ?>" class="btn btn-danger btn-xs" title="Eliminar gestión"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php
                    $i++;
                    } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
