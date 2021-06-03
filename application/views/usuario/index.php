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
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, login, correo electrónico.." onkeypress="buscarusuario(event)">
</div>
<div class="row col-md-12" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
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
<!-------------------------- INICIO modal para restablecer acceso al ssitema de un asociado -------------------------->
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
<!-------------------------- F I N  modal para restablecer acceso al ssitema de un asociado -------------------------->
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