<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>" type="text/javascript"></script>
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
<input type="hidden" id="elasociadoactual">
<input type="hidden" id="elasociadoactualci">
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

        </div> Registros Encontrados: <span id="numeroreg"></span>
    </section>
</div>
<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese Apellido(s), Nombre(s), C.I...." onkeypress="buscarasociado(event)">
</div>
<div class="row col-md-12" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>N&deg;</th>
                        <th>Socio</th>
                        <th>Informaci&oacute;n</th>
                        <th>Fecha Nac. (Edad)</th>
                        <th>Direcc&oacute;n tel&eacute;fono</th>
                        <th>Correo Electr&oacute;nico</th>
                        <th>Estado</th>
                        <th></th>
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

<!----------------------------------- INICIO modal para mostrar Imagen de un asociado ----------------------------------->
<div class="modal fade" id="modalimagenasociado" tabindex="-1" role="dialog" aria-labelledby="modalimagenasociadolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" id="elasociado"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <span id="imagenasociado"></span>
            </div>
            <div class="modal-footer text-center d-block">
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!----------------------------------- F I N  modal para mostrar Imagen de un asociado ----------------------------------->
<!----------------------------------- INICIO modal para dar de baja a un asociado ----------------------------------->
<div class="modal fade" id="modaldardebajaasociado" tabindex="-1" role="dialog" aria-labelledby="modaldardebajaasociadolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" id="elasociadobaja"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <span>Esta seguro que quiere dar de baja a este asociado?</span>
            </div>
            <div class="modal-footer text-center d-block">
                <a class="btn btn-success" onclick="dardebaja()" ><span class="fa fa-check"></span> Aceptar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!----------------------------------- F I N  modal para dar de baja a un asociado ----------------------------------->
<!----------------------------------- INICIO modal para dar de alta a un asociado ----------------------------------->
<div class="modal fade" id="modaldardealtaasociado" tabindex="-1" role="dialog" aria-labelledby="modaldardealtaasociadolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" id="elasociadoalta"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <span>Esta seguro que quiere dar de alta a este asociado?</span>
            </div>
            <div class="modal-footer text-center d-block">
                <a class="btn btn-success" onclick="dardealta()" ><span class="fa fa-check"></span> Aceptar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!----------------------------------- F I N  modal para dar de alta a un asociado ----------------------------------->
<!----------------------------------- INICIO modal para dar de alta a un asociado ----------------------------------->
<div class="modal fade" id="modalrestablecerasociado" tabindex="-1" role="dialog" aria-labelledby="modalrestablecerasociadolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" id="elasociadorestablecer"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <span>Esta seguro que quiere restablecer el ingreso al sistema de este asociado?</span>
            </div>
            <div class="modal-footer text-center d-block">
                <a class="btn btn-success" onclick="restableceringreso()" ><span class="fa fa-check"></span> Aceptar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!----------------------------------- F I N  modal para dar de alta a un asociado ----------------------------------->
