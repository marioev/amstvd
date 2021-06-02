

<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo $organizacion['organ_nombre']; ?> :: Ingresar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="organizacion, asistencia, manejo economico, pagos, reuniones" />
  
        <link rel="stylesheet" href="<?php echo site_url('resources/css/all.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/css/icheck-bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/css/adminlte.min.css');?>">

        <!--<link rel="shortcut icon" href="<?php //echo site_url('resources/images/icono.png');?>" />-->
    </head>
    <body>
        <?php if($diaslicencia < 0){ ?>
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion-alert-circled"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><font size="4"><b>LA LICENCIA ESTA EXPIRADA </b></font></span>
                    <span class="info-box-number"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        No podra ingresar al Sistema.  Consulte con el Proveedor
                    </span>
                </div>
            </div>
        <?php } else if($diaslicencia == 5000){ ?>
        <?php } else { ?>
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion-alert-circled"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><font size="4">LA LICENCIA VENCERA EN: <font size="5"><b><?php echo $diaslicencia; ?></b></font> DIAS</font></span>
                    <span class="info-box-number"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        No podra ingresar al Sistema.
                    </span>
                </div>
            </div>
        <?php } ?>
        <div class="hold-transition login-page" >
            <div class="login-box">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                    <?php
                        echo $this->session->flashdata('msg');
                    ?>
                        <font size="5" face="Arial black"><b><?php echo $organizacion['organ_nombre']; ?></b></font><br>              
                        <img src="<?php echo base_url('resources/images/organizacion/'.$organizacion["organ_imagen"]); ?>"  style="width:80px;height:80px">
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg text-bold"><?php echo $organizacion["organ_slogan"]; ?></p>
                        <?php if($diaslicencia < 0){ ?>
                        <div class="info-box bg-red">
                            <div class="info-box-content">
                                <span class="info-box-text"><font size="4"><b>LA LICENCIA ESTA EXPIRADA </b></font></span>
                                <span class="info-box-number"></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                    No podra ingresar al Sistema
                                </span>
                                <span class="progress-description">
                                    Consulte con el Proveedor
                                </span>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <?php echo form_open('verificar'); ?>
                        <div class="input-group mb-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Usuario" autocomplete="off" autofocus  required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!--<button type="submit" class="btn btn-primary btn-block">Ingresar</button>-->
                                <button type="submit" class="btn btn-primary btn-outline-success btn-block"><span class="text-white">Ingresar</span></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php } ?>
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4">
                                <h5><a href="<?php echo base_url(); ?>">Regresar</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo site_url('resources/js/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo site_url('resources/js/bootstrap.bundle.min.js');?>" type="text/javascript"></script>
        <!--<script src="<?php //echo site_url('resources/js/adminlte.min.js');?>" type="text/javascript"></script>-->
    </body>
</html>
  