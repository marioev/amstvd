<script src="<?php echo base_url('resources/js/orden_dia.js'); ?>" type="text/javascript"></script>
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
<input type="hidden" id="reunion_id" value="<?php echo $reunion['reunion_id'];?>">
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Orden del Día</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a onclick="mostrarnuevomodalorden()" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Nueva Orden</a>
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
                        <th>Orden del Día</th>
                        <th>Detalle</th>
                        <th>Fecha y hora</th>
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

<a href="<?php echo site_url('reunion'); ?>" class="btn btn-danger">
    <i class="fa fa-times"></i> Cancelar</a>
<!-------------------------- INICIO modal para restablecer acceso al ssitema de un asociado -------------------------->
<div class="modal fade" id="modalnuevaorden" tabindex="-1" role="dialog" aria-labelledby="modalnuevaordenlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" >Registrar Orden del día</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row col-md-12" id='loader2'  style='display:none; text-align: center'>
                    <img src="<?php echo base_url("resources/images/loader2.gif"); ?>"  >
                </div>
                <div class="col-md-12">
                    <label for="ordendia_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                    <div class="form-group">
                        <input type="text" name="ordendia_nombre" value="<?php echo $this->input->post('ordendia_nombre'); ?>" class="form-control" id="ordendia_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        <span class="text-danger" id="mensaje_nombre"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center d-block">
                <a class="btn btn-success" onclick="registrar_ordendia()" id="cobrar" ><span class="fa fa-check"></span> Registrar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!-------------------------- F I N  modal para restablecer acceso al ssitema de un asociado -------------------------->