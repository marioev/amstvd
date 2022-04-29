<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
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
                    <h1>Rol</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('rol/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Rol</a>
                </div>
            </div>

        </div>
    </section>
</div>
<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el Nombre">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tbody class="buscar">
                    <?php
                    foreach($all_rolpadre as $rolpadre){
                        $i = 0;
                    ?>
                    <tr>
                        <th colspan="5"><b><?php echo $rolpadre['rol_nombre']; ?>
                            <a href="<?php echo site_url('rol/edit/'.$rolpadre['rol_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                        </th>
                    </tr>
                    <?php
                    $band = true;
                    foreach($all_rolhijo as $rolhijo){
                        if($rolhijo['rol_idfk'] ==$rolpadre['rol_id']){
                        $colorbaja = "style='background-color:".$rolhijo['estado_color']."'";
                        if($band == true){
                    ?>
                    <tr>
                        <th>N&deg;</th>
                        <th>Nombre</th>
                        <th>Descripci&oacute;n</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <?php
                    $band = false;
                        }
                    ?>
                    <tr <?php echo $colorbaja; ?>>
                        <td><?php echo $i+1; ?></td>
                        <td><b><?php echo $rolhijo['rol_nombre']; ?></td>
                        <td><b><?php echo $rolhijo['rol_descripcion']; ?></td>
                        <td class="text-center"><?php echo $rolhijo['estado_nombre']; ?></td>
                        <td>
                            <a href="<?php echo site_url('rol/edit/'.$rolhijo['rol_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                        </td>
                    </tr>
                    <?php $i++; } } } ?>
                    </tbody>
                </table>
                               
            </div>
             
        </div>
    </div>
</div>
