<div class="row">&nbsp;</div>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><i class="fa fa-users"></i></h3>
                <p><?php echo $asociado; ?> Asociados</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo site_url('asociado'); ?>" class="small-box-footer">Asociados <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><i class="ion ion-filing"></i> <!--<sup style="font-size: 20px">%</sup>--></h3>
                <p><?php echo $reunion; ?> Reuniones</p>
            </div>
            <div class="icon">
                <i class="ion ion-filing"></i>
            </div>
            <a href="<?php echo site_url('reunion'); ?>" class="small-box-footer">Reuniones <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo $aporte; ?></h3>
                <p>Aportes</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="<?php echo site_url('aporte'); ?>" class="small-box-footer">Aportes <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo $informacion; ?></h3>
                <p>Informaci&oacute;n</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-clipboard"></i>
            </div>
            <a href="<?php echo site_url('informacion'); ?>" class="small-box-footer">Informaci&oacute;n <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>