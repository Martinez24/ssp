<?php //include('login/validarsesion.php');?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proforma | Consulta</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon"/>

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
        <section class="content-header">
          <h1>
            Consulta de
            <small>Proforma</small>
          </h1>          
        </section>
        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <a href="sqlGestion.php?imprimir=<?php echo $proforma['id_proyecto']; ?>" class="btn btn-success pull-right"><i class="fa fa-print"></i> Imprimir tarea</a>
          <div class="row">
              <img src="../assets/img/plasma.PNG" width="350">
              <center><h4>FACTURA PROFORMA PROYECTOS</h4></center>
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-file-text"></i> No. de Factura: <?php echo "00".$proforma1['no_factura'];?>
                <small class="pull-right"><b>Fecha de inicio: </b><?php echo $proforma1['fecha_inicio'];?></small>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
           <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                  <h5>Venta para:</h5>
                    <th>Nombre</th>
                    <th>Domicilio</th>
                    <!--Eastado, municipio y cp van juntos en una columna-->
                    <th>Ciudad</th>
                    <th>RFC</th>
                    <th>Destino</th>
                    <th>Fecha de Entrega</th>                    
                    <th>Fecha de Creación</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    echo "<tr>";
                    echo "<td>".$proforma1['modelo']."</td>";
                    echo "<td>".$proforma['nombre']."</td>";
                    echo "<td>".$tarea['maquina']."</td>";
                    echo "<td>".$tarea['nombre']."</td>";
                    echo "<td>".$tarea['destino']."</td>";
                    echo "<td>".$tarea['fecha_entrega']."</td>";
                    echo "<td>".$tarea['fecha_creacion']."</td>";
                    echo "</tr>";
                 
                ?>
                </tbody>
              </table>
            </div>
            <!--<div class="col-sm-4 invoice-col">
              <h5>Vendedor:</h5>
              <address>
                <b>Nombre:</b> <?php echo $venta['usuario_nombre'];?><br>
                <b>Correo Electrónico:</b><?php echo $venta['usuario_email'];?><br>
              </address>
            </div>-->
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <h5>Departamentos relacionados al proyecto</h5>
              <table class="table table-striped">
                <thead>
                <tr>
                <th>Usuario</th>
                  <th>Estado del departamento</th>
                  <th>Observación</th>
                  <th>Fecha de inicio del proyecto</th>
                  <th>Fecha de entrega del proyecto</th>
                  <th>Nueva fecha de entrega
                  <th>Área involucrada</th>
                  <th>Personal en cargo</th>
                  <th>Identificador del proyecto</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $prioridad_color = array(   
                   'Retraso' => '#FFEE58',   
                   'Tiempo' => '#B2FF59'  
                     );
                    if(count($proyectos) > 0){
                      foreach ($proyectos as $index => $proyecto) {
                      echo "<tr bgcolor=' ".$prioridad_color[$proyecto['status']]."'>";
                      echo "<td>".$proyecto['usuario']."</td>";
                      echo "<td>".$proyecto['status']."</td>";
                      echo "<td>".$proyecto['observacion']."</td>";
                      echo "<td>".$proyecto['fecha_inicio']."</td>";
                      echo "<td>".$proyecto['fecha_entrega']."</td>";
                      echo "<td>".$proyecto['fecha_reprogramada']."</td>";
                      echo "<td>".$proyecto['departamento']."</td>";
                      echo "<td>".$proyecto['personal']."</td>";
                      echo "<td>".$proyecto['proyecto']."</td>";
                      echo "</tr>";
                      }
                    } else {
                      echo "<tr><td><span>No hay departamentos agregados</span></td></tr>";
                    }                    
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
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
    <script src="../assets/plugins/format-number/jquery.format-number.plugin.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.money').formatNumber();
      });
    </script>
  </body>
</html>
