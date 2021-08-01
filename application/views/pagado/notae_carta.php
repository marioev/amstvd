<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>    
<script type="text/javascript">
    $(document).ready(function()
    {
        //window.onload = window.print();
    });
</script>

<style type="text/css">

/*p {
    font-family: Arial;
    font-size: 7pt;
    line-height: 120%;   /*esta es la propiedad para el interlineado*/
 /*   color: #000;
    padding: 10px;
}*/

div {
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
margin-left: 10px;
margin: 0px;
}


table{
width : 7cm;
margin : 0 0 0px 0;
padding : 0 0 0 0;
border-spacing : 0 0;
border-collapse : collapse;
font-family: Arial;
font-size: 8pt;  

td {
border:hidden;
}
}

td#comentario {
vertical-align : bottom;
border-spacing : 0;
}
div#content {
background : #ddd;
font-size : 8px;
margin : 0 0 0 0;
padding : 0 5px 0 5px;
border-left : 1px solid #aaa;
border-right : 1px solid #aaa;
border-bottom : 1px solid #aaa;
}
div.redondeado{
    border: 1px solid #000000;
-moz-border-radius: 7px;
-webkit-border-radius: 7px;
padding: 5px;
}
</style>

<!--<link href="<?php //echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<?php
    $ancho = $configuracion["config_anchorecibo"]."cm";
    $margen_izquierdo = $configuracion["config_margenizqrecibo"]."cm";
?>
<div class="table table-responsive" style="padding: 0;">   
    <table class="table">
        <tr>
            <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" > </td>
            <td style="padding: 0;">
                <table class="table" style="width: <?php echo $ancho;?>; padding: 0;" >
                    <tr>
                        <td style="width: 6cm; padding: 0; line-height: 9px;" >
                            <center>
                                <?php
                                if($configuracion["config_imagenrecibo"] == "MOSTRAR"){
                                    if($organizacion['organ_imagen'] != "" && $organizacion['organ_imagen'] != null){
                                        $logo_thumb = base_url("resources/images/organizacion/")."thumb_".$organizacion['organ_imagen'];
                                ?>
                                <img src="<?php echo $logo_thumb; ?>" width="80" height="60" style="padding-bottom: 2px" /><br>
                                <?php
                                    }
                                }
                                ?>
                                <font size="2" face="Arial black"><b><?php echo $organizacion['organ_nombre']; ?></b></font><br>
                                <?php if (isset($organizacion['organ_slogan'])){ ?>
                                <small>
                                    <font size="1" face="Arial narrow"><b><?php echo $organizacion['organ_slogan']; ?></b></font><br>                                    
                                </small> 
                                <?php } ?>
                                <font size="1" face="Arial narrow">
                                    <small>
                                        <?php echo $organizacion['organ_direccion']; ?><br>
                                        <?php echo $organizacion['organ_telefono']; ?><br>
                                        <?php echo $organizacion['organ_ubicacion']; ?>
                                    </small>                                
                                </font>
                            </center>
                        </td>
                        <td style="width: 6cm; padding: 0; line-height: 12px; " > 
                            <center><br>
                                <font size="3" face="arial"><b>NOTA DE ENTREGA</b></font><br>
                                <font size="3" face="arial"><b>Nº 00<?php echo $pagado['pagado_numrecibo']; ?></b></font> <br>
                                <font size="1" face="arial"><b>Expresado en <?php echo $configuracion["moneda_nombre"]; ?></b></font><br>
                            </center>
                        </td>
                        <td style="width: 6cm; padding: 0; line-height: 9px;" >
                            <div class="redondeado">
                            <small>
                                <?php
                                $fecha = date("d/m/Y", strtotime($pagado['pagado_fecha']));
                                ?>
                                <b>LUGAR Y FECHA: </b><?php echo $organizacion['organ_departamento'].", ".$fecha; ?> <br>
                                <b>CODIGO: </b><?php echo $pagado['asociado_codigo']; ?> <br>
                                <b>SEÑOR(ES): </b><?php echo $pagado['asociado_apellido'].$pagado['asociado_nombre']; ?><br>
                                <b>DIRECCIÓN: </b><?php echo $pagado['asociado_direccion']; ?>
                                <?php
                                if(($pagado['asociado_telefono'] != null || $pagado['asociado_telefono'] != "") || ($pagado['asociado_celular'] != null || $pagado['asociado_celular'] !="")){
                                $guion = "";
                                if($pagado['asociado_telefono'] >0 && $pagado['asociado_celular'] >0){
                                    $guion = " - ";
                                }
                                ?>
                                <br><b>TELEFONOS: </b><?php echo $pagado['asociado_telefono'].$guion.$pagado['asociado_celular']; ?>
                                <?php } ?>
                            <br>
                            </small>
                            </div>
                        </td>
                    </tr>
                </table>
                <table class="table table-striped table-condensed"  style="width: <?php echo $ancho;?>;" >
                    <tr  style="border-top-style: solid; border-bottom-style: solid; border-color: black;">
                        <td align="center" style="padding: 0; background-color: #a6a2a2 !important; -webkit-print-color-adjust: exact;"><b>DESCRIPCIÓN</b></td>
                        <td align="center" style="padding: 0; background-color: #a6a2a2 !important; -webkit-print-color-adjust: exact;"><b>TOTAL <?php echo $configuracion["moneda_nombre"]; ?></b></td>
                    </tr>
                    <?php
                        $cont = 0;
                        $cantidad = 0;
                        $total_descuento = 0;
                        $total_final = 0;
                        $total_final_me = 0;
                        foreach($aporte_asociado as $a){;
                            $total_final += $a['aporteasoc_cobrado'];
                    ?>
                    <tr>
                        <td style="padding: 0">
                            <font style="font-size:10px; font-family: arial;"> <?php echo $a['tipoaporte_nombre'].", ".$a['aporte_nombre'];?>
                        </td>
                        <td align="right" style="padding: 0"><?php echo number_format($a['aporteasoc_cobrado'],2,'.',','); ?></td>
                   </tr>
                   <?php } ?>
                </table>
                <table class="table" style="max-width: <?php echo $ancho;?>;">
                    <tr style="border-top-style: solid; background-color: #a6a2a2; border-color: black; ">
                        <td align="left" style=" padding: 3px; font-size: 9px; background-color: #a6a2a2 !important; -webkit-print-color-adjust: exact; line-height: 10px;">
                            USUARIO: <b><?php echo $pagado['usuario_nombre']; ?></b><br>
                            COD.: <b><?php echo $pagado['pagado_id']; ?></b><br>
                        </td>
                        <!--<td align="right" style="background-color: #aaa !important; -webkit-print-color-adjust: exact;">
                            <?php echo "GRACIAS POR SU PREFERENCIA...!!!"; ?>
                        </td>-->
                        <td align="right"  style="padding: 0;  line-height: 10px; background-color: #a6a2a2 !important; -webkit-print-color-adjust: exact;">
                            <font size="2">
                            <b>
                                <br><?php echo "TOTAL FINAL ".$configuracion["moneda_nombre"].": ".number_format($pagado['pagado_total'] ,2,'.',','); ?><br>
                            </b>
                            </font>
                            <font size="1" face="arial narrow">
                            <?php
                            if ($configuracion["moneda_id"]==1){
                                $moneda_nombre = "Bolivianos";
                            }else{
                                $moneda_nombre = $configuracion["moneda_nombre"];
                            }
                            ?>
                            <?php echo "SON: ".num_to_letras($total_final,$moneda_nombre); ?><br>
                            </font>
                            <font size="1">
                            <?php echo "EFECTIVO Bs ".number_format($pagado['pagado_efectivo'],2,'.',','); ?><br>
                            <?php echo "CAMBIO Bs ".number_format($pagado['pagado_cambio'],2,'.',','); ?>
                            </font>
                        </td>
                    </tr>
                    <?php
                    if($pagado['pagado_obs'] != null || $pagado['pagado_obs'] != ""){
                    ?>
                    <tr>
                        <td colspan="3">
                            <b>NOTA: </b><?php echo $pagado['pagado_obs']; ?>
                         </td>
                    </tr>
                    <?php } ?>

                </table>
                <table class="table" style="width: <?php echo $ancho;?>;">
                    <tr>
                        <td  style="padding: 0">
                            <center>
                                __________________________<br>
                                        ENTREGE CONFORME
                            </center>  
                            <?php echo date("d/m/Y H:i:s"); ?>
                        </td>
                        <td style="padding: 0"></td>
                        <td  style="padding: 0">
                            <center>
                                __________________________<br>
                                        RECIBI CONFORME
                            </center>  
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>