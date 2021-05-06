<script src="<?php echo base_url('resources/js/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/asociado.js'); ?>" type="text/javascript"></script>
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
                    <h1>Asociados</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('asociado/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Asociado</a>
                </div>
            </div>

        </div> Registros Encontrados: <?php echo sizeof($asociado); ?>
    </section>
</div>
<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese Apellido(s), Nombre(s), C.I....">
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
                        <th>Socio</th>
                        <th>Estado Id</th>
                        <th>Estadocivil Id</th>
                        <th>Expedido Id</th>
                        <th>Genero Id</th>
                        <th>Sociado Apellido</th>
                        <th>Asociado Fechanac</th>
                        <th>Asociado Ci</th>
                        <th>Asociado Ciext</th>
                        <th>Asociado Codigo</th>
                        <th>Asociado Direccion</th>
                        <th>Asociado Telefono</th>
                        <th>Asociado Celular</th>
                        <th>Asociado Foto</th>
                        <th>Asociado Email</th>
                        <th>Asociado Login</th>
                        <th>Asociado Clave</th>
                        <th>Asocadio Codactivacion</th>
                        <th>Asociado Fechactivacion</th>
                        <th>Actions</th>
                    </tr>
                    <tbody id="listasocios"></tbody>
                    <?php /*foreach($asociado as $a){ ?>
                    <tr>
                        <td><?php echo $a['asociado_id']; ?></td>
                        <td><?php echo $a['estado_id']; ?></td>
                        <td><?php echo $a['estadocivil_id']; ?></td>
                        <td><?php echo $a['expedido_id']; ?></td>
                        <td><?php echo $a['genero_id']; ?></td>
                        <td><?php echo $a['asociado__nombre']; ?></td>
                        <td><?php echo $a['sociado_apellido']; ?></td>
                        <td><?php echo $a['asociado_fechanac']; ?></td>
                        <td><?php echo $a['asociado_ci']; ?></td>
                        <td><?php echo $a['asociado_ciext']; ?></td>
                        <td><?php echo $a['asociado_codigo']; ?></td>
                        <td><?php echo $a['asociado_direccion']; ?></td>
                        <td><?php echo $a['asociado_telefono']; ?></td>
                        <td><?php echo $a['asociado_celular']; ?></td>
                        <td><?php echo $a['asociado_foto']; ?></td>
                        <td><?php echo $a['asociado_email']; ?></td>
                        <td><?php echo $a['asociado_login']; ?></td>
                        <td><?php echo $a['asociado_clave']; ?></td>
                        <td><?php echo $a['asocadio_codactivacion']; ?></td>
                        <td><?php echo $a['asociado_fechactivacion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('asociado/edit/'.$a['asociado_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asociado/remove/'.$a['asociado_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php }*/ ?>
                </table>
            </div>
        </div>
    </div>
</div>
