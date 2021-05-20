<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>" type="text/javascript"></script>
<script src="<?php echo site_url('resources/js/organizacion.js');?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<div class="box-header">
    <section class="content-header" style="padding-left: 0px; padding-right: 0px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6" style="padding-left: 0px">
                    <h1>Organizaci&oacute;n</h1>
                </div>
                <?php
                if(!isset($organizacion)){
                ?>
                <div class="col-md-6 text-right" style="padding-right: 0px">
                    <a href="<?php echo site_url('organizacion/add'); ?>" class="btn btn-success btn-sm"><span class="fa fa-pencil-square-o"></span> Registrar Organizaci&oacute;n</a>
                </div>
                <?php } ?>
            </div>
    </section>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>N&deg;</th>
                        <th>Organizaci&oacute;n</th>
                        <th>Map</th>
                        <th>Eslogan</th>
                        <th>Direcci&oacute;n</th>
                        <th>Tel&eacute;fono</th>
                        <th>Zona</th>
                        <th>Ubicaci&oacute;n</th>
                        <th>Departamento</th>
                        <th></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach($organizacion as $o){ ?>
                    <tr>
			<td><?php echo ($i+1); ?></td>
                            <td>
                                <div id="horizontal">
                                    <div id="contieneimg">
                                        <?php
                                        $mimagen = "thumb_".$o['organ_imagen'];
                                        if($o['organ_imagen']){
                                        ?>
                                        <a class="btn btn-xs" onclick='mostrarmodal("<?php echo $o["organ_nombre"]; ?>", "<?php echo $o["organ_imagen"]; ?>")' style="padding: 0px;">
                                            <?php
                                            echo '<img src="'.site_url('/resources/images/organizacion/'.$mimagen).'" />';
                                            ?>
                                        </a>
                                        <?php
                                        }else{
                                            echo '<img src="'.site_url('/resources/images/organizacion/organizacion.jpg').'" />'; 
                                        }
                                        ?>
                                    </div>
                                        <div style="padding-left: 4px">
                                            <?php echo "<b id='masg'>".$o['organ_nombre']."</b>";
                                            ?>
                                        </div>
                                </div>
                            </td>
                            <td class="no-print" style="text-align: center">
                                <?php
                                if(($o["organ_latitud"]==0 && $o["organ_longitud"]==0) || ($o["organ_latitud"]==null && $o["organ_longitud"]==null) || ($o["organ_latitud"]== "" && $o["organ_longitud"]=="")){
                                ?>
                                    <img src="<?php echo base_url('resources/images/nohay_ubicacion.png'); ?>" width="30" height="30">
                                <?php
                                    }else{
                                ?>
                                <a href="https://www.google.com/maps/dir/<?php echo $o["organ_latitud"].",".$o["organ_longitud"]; ?>" target="_blank" title="<?php echo "lat.:".$o["organ_latitud"].", long.:".$o["organ_longitud"]?>">
                                <img src="<?php echo base_url('resources/images/ubicacion.jpg'); ?>" width="30" height="30">
                                </a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td><?php echo $o['organ_slogan']; ?></td>
                            <td><?php echo $o['organ_direccion'];
                                    if($o['organ_email']){
                                                echo "<br><b>e-mail: </b>".$o['organ_email'];
                                            } ?></td>
                            <td><?php echo $o['organ_telefono']; ?></td>
                            <td><?php echo $o['organ_zona']; ?></td>
                            <td><?php echo $o['organ_ubicacion']; ?></td>
                            <td><?php echo $o['organ_departamento']; ?></td>
                            <td>
                                <a href="<?php echo site_url('organizacion/edit/'.$o['organ_id']); ?>" class="btn btn-info btn-xs" title="Modificar organización"><span class="fa fa-pencil"></span></a> 
                            </td>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>

<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
<div class="modal fade" id="mostrarimagen" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center" style="display: block">
                <span class="text-bold" id="nombreorganizacion"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <span id="imagenorganizacion"></span>
                <?php //echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/empresas/'.$o['empresa_imagen']).'" />'; ?>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->