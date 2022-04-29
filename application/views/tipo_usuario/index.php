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
                    <h1>Tipo Usuario</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('tipo_usuario/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Tipo Usuario</a>
                </div>
            </div>

        </div> Registros Encontrados: <?php echo sizeof($tipo_usuario); ?>
    </section>
</div>
<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el Nombre">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>N&deg;</th>
                        <th>Nombre</th>
                        <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar">
                    <?php  $cont = 0;
                    foreach($tipo_usuario as $t){ 
                        $cont = $cont+1; ?>
                    <tr>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo $t['tipousuario_nombre']; ?></td>
                        <td class="no-print">
                            <a href="<?php echo site_url('tipo_usuario/edit/'.$t['tipousuario_id']); ?>" class="btn btn-info btn-xs" title="Modificar tipo de usuario"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('tipo_usuario/editrol/'.$t['tipousuario_id']); ?>" class="btn btn-warning btn-xs" title=""><span class="fa fa-list-ol"></span></a>--> 
                            <!--<a href="<?php //echo site_url('tipo_usuario/inactivar/'.$t['tipousuario_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-ban"  title="Inactivar"></span></a>
                            <a href="<?php //echo site_url('tipo_usuario/remove/'.$t['tipousuario_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
