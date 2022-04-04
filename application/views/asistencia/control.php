<script src="<?php echo base_url('resources/js/control_asistencia.js'); ?>" type="text/javascript"></script>
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
<input type="hidden" id="reunion_id" value="<?php echo $reunion_id;?>">
<input type="hidden" id="ordendia_id" value="<?php echo $ordendia_id;?>">
<!--<input type="hidden" id="ordendia_id" value="<?php //echo $ordendia_id;?>">-->
<input type="hidden" name="all_estado" id="all_estado" value='<?php echo json_encode($all_estado); ?>' />
<input type="hidden" name="all_tipomulta" id="all_tipomulta" value='<?php echo json_encode($all_tipomulta); ?>' />
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1><?php echo $orden_dia["ordendia_nombre"]; ?></h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px; display: none" id="esparanuevaasistencia">
                    <a onclick="mostrarnuevomodalcontrol()" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Generar Control de Asistencia</a>
                </div>
            </div>

        </div>
        Registros Encontrados: <span id="numeroreg"></span>
    </section>
</div>
<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese orden del día">
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
                        <th>Asociado</th>
                        <th>Asistencia</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="listaordendia"></tbody>
                    <?php /*foreach($orden_dia as $o){ ?>
                    <tr>
                        <td><?php echo $o['ordendia_id']; ?></td>
                        <td><?php echo $o['reunion_id']; ?></td>
                        <td><?php echo $o['ordendia_nombre']; ?></td>
                        <td><?php echo $o['ordendia_observacion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('orden_dia/edit/'.$o['ordendia_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('orden_dia/remove/'.$o['ordendia_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php }*/ ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-center">
    <a onclick="guardar_asistencia()" class="btn btn-success">
        <i class="fa fa-check"></i> Guardar Asistencia</a>
    <a href="<?php echo site_url('orden_dia/nuevareunion/'.$reunion_id); ?>" class="btn btn-danger">
    <i class="fa fa-times"></i> Salir</a>
</div>
<!-------------------------- INICIO modal nuevo control -------------------------->
<div class="modal fade" id="modalnuevocontrol" tabindex="-1" role="dialog" aria-labelledby="modalnuevocontrollabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" >Generar Control de Asistencia</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row col-md-12" id='loader2'  style='display:none; text-align: center'>
                    <img src="<?php echo base_url("resources/images/loader2.gif"); ?>"  >
                </div>
                <div class="col-md-12 text-center">
                    <label for="asistencia_control" class="control-label">
                        ¿Esta seguro que quiere generar <br> Control de Asistencia?
                    </label>                    
                </div>
                <div class="col-md-12">
                    <label for="asistencia_fecha" class="control-label"><span class="text-danger">*</span>Fecha y Hora</label>
                    <div class="form-group" style="display: flex">
                        <input type="date" name="asistencia_fecha" class="form-control" id="asistencia_fecha" required />
                        <input type="time" step="any" name="asistencia_hora" class="form-control" id="asistencia_hora" required />
                        <span class="text-danger" id="mensaje_fechahora"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="asistencia_estado" class="control-label"><span class="text-danger">*</span>Estado</label>
                    <div class="form-group">
                        <span id="paraestado"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center d-block">
                <a class="btn btn-success" onclick="generar_asistencia()" id="cobrar" ><span class="fa fa-check"></span> Generar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!-------------------------- F I N  modal nuevo control -------------------------->
