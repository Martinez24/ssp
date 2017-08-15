<?php include('../login/validarsesion.php');?>
<!--Conexion a la base de datos -->
 <?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $bd = 'ssp';                  
  $conexion = @mysql_connect($host, $user, $password);
  mysql_query("SET NAMES 'utf8'");
  @mysql_select_db($bd, $conexion);
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar | Pago </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.css">
    <!-- jQuery 2.1.4 -->
    <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--COMPONENTES PARA PLUGIN SELECT2-->
    <link rel="stylesheet" href="../assets/plugins/select2/select2.min.css">
    <script src="../assets/plugins/select2/select2.full.min.js"></script>
    <link href="../assets/plugins/pnotify/css/pnotify.custom.min.css" rel="stylesheet">
    <script src="../assets/plugins/pnotify/js/pnotify.custom.min.js"></script>
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <?php
        include('header.php');
      ?>
      <!-- MENU -->
      <?php
        include('menu.php');
      ?>

      <!-- MENU -->
      <div class="content-wrapper" id="content"> 
<!--Breadcrumb -->
              <section class="content-header">
                <ol class="breadcrumb">
                   <i class="fa fa-dashboard"></i>
                    <li><a href="">Home</a></li>
                    <li>Cobros</li>
                    <li class="active">Editar Pago</li>
                </ol>
              </section>
<!--Termina breadcrumb.-->
        <section class="content-header">
          <h1>
            Editar
            <small> pago</small>
          </h1>
        </section>
<section class="content">
        <div> 
          <div class="col-lg-6">
             <div class="row">
              <div class="panel">
                <div class="panel-heading"></div>
                <div class="panel-body">
<!--Inicia el formulario para editar la proforma-->
                  <form method="post" action="cobros.php" enctype="multipart/form-data" id="form">
                    <input type="hidden" name="cobro_id" value="<?php echo $proyecto['id_cobro'];?>">
                    <div class="form-group">
                    <div>
                      
                    </div>
                  <h4>Información del proyecto</h4>
                  <img class="img-responsive pull-right" width="160" src="../assets/img/gpa.png" alt="Grupo Plasma Automation">
                      <label for="no_serie"><b>Número de factura: </b></label>
                        <?php echo "00".$proyecto['no_factura']."<br>";
                         echo "<b>Fecha inicio:</b> ".$proyecto['fecha_inicio']."<br>";
                         echo "<b>Fecha entrega: </b>".$proyecto['fecha_entrega']."<br>";
                         echo "<b>Cliente: </b>".$proyecto['nombre']."<br>";
                         echo "<b>Vendedor: </b>".$proyecto['vendedor']."<br>";
                         echo "<b>Proyecto: </b>".$proyecto['modelo']."<br>";
                         echo "<b>Porcentaje de pago actual: </b><br><td><h5><small class='pull-right'>".$proyecto['porcentaje'].'%'."</small></h5><div class='progress xs'><div class='progress-bar progress-bar-green' style='width:".$proyecto['porcentaje'].'%'."'' role='progress-bar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'></div></div></td>";
                      ?>                      
                    </div>
                    <div class="form-data">
                    <h4><label>Nuevo pago</label></h4>
                      <input type="number" name="porcentaje" class="form-control" required>
                    </div><br>
                    <input type="submit" name="guardar_edicion" value="Guardar Pago" class="btn btn-primary">
                    </form>
                </div>
              </div>
              </div>
            </div>
          </div>
</section>
<!--Termina formulario de proforma-->

        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
      </footer>
    </div><!-- ./wrapper -->
    <!-- Slimscroll -->
    <script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
    <script src="../assets/js/jquery.selectedoption.plugin.js"></script>
    <script src="../assets/js/parsley.js"></script>
     <script type="text/javascript">
     
    </script>
  </body>
</html>
