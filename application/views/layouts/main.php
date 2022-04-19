<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $session_data = $this->session->userdata('logged_in');
        $rolusuario = $session_data['rol'];
    ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A.M.S.T.V.D.<?php if(isset($page_title)){ echo " - ".$page_title; }?> </title>
  
  <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>" type="text/javascript"></script>
  
  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/all.min.css');?>">
  <!--<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/ionicons.min.css');?>">
  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/tempusdominus-bootstrap-4.min.css');?>">
  <!--<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">-->
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
  <link rel="stylesheet" href="<?php echo site_url('resources/css/icheck-bootstrap.min.css');?>">
  <!--<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">-->
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/jqvmap.min.css');?>">
  <!--<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/adminlte.min.css');?>">
  <!--<link rel="stylesheet" href="dist/css/adminlte.min.css">-->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/OverlayScrollbars.min.css');?>">
  <!--<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">-->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/daterangepicker.css');?>">
  <!--<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">-->
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/summernote-bs4.min.css');?>">
  <!--<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">-->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?php $colorfondo = "#8ad67c"; ?>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light" style="background-color: <?php echo $colorfondo; ?>">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>A.M.S.T.V.D.</li>
            </ul>
            
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo strtolower($session_data['usuario_login']); ?></span>
                    </a>
                    <ul class="dropdown-menu" style="top: 45px">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']); ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo ucwords(strtolower($session_data['usuario_nombre'])).' - '.$session_data['tipousuario_descripcion']; ?>
                                <small><?php echo $session_data['usuario_email']; ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!--<div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>-->
                            <div class="pull-right">
                                <a href="<?php echo site_url()?>verificar/logout" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url(); ?>" class="brand-link" style="background-color: <?php echo $colorfondo; ?>">
      <img src="resources/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">A.M.S.T.V.D.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?php echo ucwords(strtolower($session_data['usuario_nombre'])); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php echo site_url('dashboard');?>" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('aporte');?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Aportes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Cobro de
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('aporte_asociado');?>" class="nav-link">
                                <i class="fa fa-list-ol nav-icon"></i>
                                <p>Aportes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('asociado');?>" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Socios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Registro de
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('aporte');?>" class="nav-link">
                                <i class="fa fa-list-ol nav-icon"></i>
                                <p>Aportes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('reunion');?>" class="nav-link">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Reuniones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('asociado');?>" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Socios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Parametros
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('configuracion');?>" class="nav-link">
                                <i class="fa fa-check-square"></i>
                                <p>Configuraci&oacute;n</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('estado');?>" class="nav-link">
                                <i class="fa fa-toggle-on"></i>
                                <p>Estado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('estado_civil');?>" class="nav-link">
                                <i class="fa fa-odnoklassniki"></i>
                                <p>Estado Civil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('expedido');?>" class="nav-link">
                                <i class="fa fa-vcard-o"></i>
                                <p>Expedido</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('genero');?>" class="nav-link">
                                <i class="fa fa-venus-mars"></i>
                                <p>G&eacute;nero</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('gestion');?>" class="nav-link">
                                <i class="fa fa-calendar"></i>
                                <p>Gesti&oacute;n</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('Organizacion');?>" class="nav-link">
                                <i class="fa fa-bank"></i>
                                <p>Organizaci&oacute;n</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-braille"></i>
                        <p>Categor&iacute;as
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('tipo_aporte');?>" class="nav-link">
                                <i class="fa fa-bars"></i>
                                <p>Tipo Aporte</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('tipo_reunion');?>" class="nav-link">
                                <i class="fa fa-list"></i>
                                <p>Tipo Reuni&oacute;n</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-lock"></i>
                        <p>Seguridad
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('rol');?>" class="nav-link">
                                <i class="fa fa-gg"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('tipo_usuario');?>" class="nav-link">
                                <i class="fa fa-list-ul"></i>
                                <p>Tipo Usuario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('usuario');?>" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!--<script src="<?php //echo site_url('resources/js/jquery.min.js');?>"></script>-->
<!--<script src="plugins/jquery/jquery.min.js"></script>-->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo site_url('resources/js/jquery-ui.min.js');?>"></script>
<!--<script src="plugins/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo site_url('resources/js/bootstrap.bundle.min.js');?>"></script>
<!--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!-- ChartJS -->
<script src="<?php echo site_url('resources/js/Chart.min.js');?>"></script>
<!--<script src="plugins/chart.js/Chart.min.js"></script>-->
<!-- Sparkline -->
<script src="<?php // echo site_url('resources/js/sparkline.js');?>"></script>
<!--<script src="plugins/sparklines/sparkline.js"></script>-->
<!-- JQVMap -->
<script src="<?php echo site_url('resources/js/jquery.vmap.min.js');?>"></script>
<script src="<?php echo site_url('resources/js/jquery.vmap.usa.js');?>"></script>
<!--<script src="plugins/jqvmap/jquery.vmap.min.js"></script>-->
<!--<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<script src="<?php echo site_url('resources/js/jquery.knob.min.js');?>"></script>
<!--<script src="plugins/jquery-knob/jquery.knob.min.js"></script>-->
<!-- daterangepicker -->
<script src="<?php echo site_url('resources/js/moment.min.js');?>"></script>
<script src="<?php echo site_url('resources/js/daterangepicker.js');?>"></script>
<!--<script src="plugins/moment/moment.min.js"></script>-->
<!--<script src="plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo site_url('resources/js/tempusdominus-bootstrap-4.min.js');?>"></script>
<!--<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>-->
<!-- Summernote -->
<script src="<?php echo site_url('resources/js/summernote-bs4.min.js');?>"></script>
<!--<script src="plugins/summernote/summernote-bs4.min.js"></script>-->
<!-- overlayScrollbars -->
<script src="<?php echo site_url('resources/js/jquery.overlayScrollbars.min.js');?>"></script>
<!--<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>-->
<!-- AdminLTE App -->
<script src="<?php echo site_url('resources/js/adminlte.js');?>"></script>
<!--<script src="dist/js/adminlte.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('resources/js/demo.js');?>"></script>
<!--<script src="dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php // echo site_url('resources/js/dashboard.js');?>"></script>
<!--<script src="dist/js/pages/dashboard.js"></script>-->
</body>
</html>
