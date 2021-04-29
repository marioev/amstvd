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
                    <h1>G&eacute;nero</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('genero/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar G&eacute;nero</a>
                </div>
            </div>

        </div> Registros Encontrados: <?php echo sizeof($genero); ?>
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
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($genero as $g){ ?>
                    <tr>
                        <td class="text-center"><?php echo ($i+1); ?></td>
                        <td><?php echo $g['genero_nombre']; ?></td>
                        <td>
                            <a href="<?php echo site_url('genero/edit/'.$g['genero_id']); ?>" class="btn btn-info btn-xs" title="Modificar género"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('genero/remove/'.$g['genero_id']); ?>" class="btn btn-danger btn-xs" title="Eliminar Género"><span class="fa fa-trash"></span></a>-->
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
