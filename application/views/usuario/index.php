<script src="<?php echo site_url('resources/js/usuario.js');?>" type="text/javascript"></script>
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
<style type="text/css">
    /*#contieneimg{
        width: 100px;
        height: 100px;
        text-align: center;
    }*/
</style>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<input type="hidden" id="elusuarioactual">

<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Usuario</a>
                </div>
            </div>

        </div> Registros Encontrados: <span id="numeroreg"></span>
    </section>
</div>
<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, login, correo electrónico.." autocomplete="off" autofocus onkeypress="buscarusuario(event)">
</div>
<div class="row col-md-12" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div style="display: none" id="bloquemensajeusuario">
                <div class="card bg-danger">
                    <div class="card-header text-center">
                        <span id="mensajeusuario"></span>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($this->session->flashdata('msg')): ?>
                <p><?php echo $this->session->flashdata('msg'); ?></p>
            <?php endif; ?>
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre/Usuario</th>
                        <th>Correo Electr&oacute;nico</th>
                        <th>Usuario(Login)</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="listausuarios"></tbody>
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
<!-------------------------- INICIO modal para cambiar contraseña de un Usuario -------------------------->
<div class="modal fade" id="modalrestablecerusuario" tabindex="-1" role="dialog" aria-labelledby="modalrestablecerusuariolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <span class="text-bold" id="elusuariocambiar"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body row clearfix">
                <div class="col-md-6">
                    <label for="usuario_clave" class="control-label"><span class="text-danger">*</span>Contraseña</label>
                    <div class="form-group">
                        <input type="password" name="usuario_clave"  class="form-control" id="usuario_clave" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="rusuario_clave" class="control-label"><span class="text-danger">*</span>Repetir Contraseña</label>
                    <div class="form-group">
                        <input type="password" name="rusuario_clave"  class="form-control" id="rusuario_clave" required/>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="help-block" style="color: #f0120a" id="mensajecambiarcontrasenia"></small>
                </div>
            </div>
            <div class="modal-footer text-center d-block">
                <a class="btn btn-success" onclick="restableceringresousuario()" ><span class="fa fa-check"></span> Aceptar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!-------------------------- F I N  modal para cambiar contraseña de un Usuario -------------------------->
<?php
/*if(isset($mensaje)){
    if($mensaje == "a"){
?>
<script type="text/javascript">
    alert("Contraseña modificada con exito");
</script>
<?php
$mensaje = "";
    }elseif($mensaje == "b"){
?>
<script type="text/javascript">
    alert("Las contraseñas no coinciden");
</script>
<?php
$mensaje = "";
    }
}*/
?>