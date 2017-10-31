<?php include('login/validarsesion.php');
 $host = "localhost";
    $user = "root";
    $password = "123";
    $bd = "ssp";
    $conexion = @mysql_connect($host, $user, $password);
    @mysql_select_db($bd, $conexion);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
   <!-- high charts scripts-->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SSP | Dashboard Administrador</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--COMPONENTES PARA PLUGIN SELECT2-->
    <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <link href="assets/plugins/pnotify/css/pnotify.custom.min.css" rel="stylesheet">
    <script src="assets/plugins/pnotify/js/pnotify.custom.min.js"></script>
  </head>
  <body class="hold-transition skin-red-light sidebar-mini">
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
        <section class="content">
          <div class="panel">

            <div class="panel-heading text-center">
            <img class="profile-user-img img-responsive img-circle" src="./assets/img/gpa.png" alt="Grupo Plasma Automation">
            <!--Inicia DashBoard
            -->
            <nav class="navbar navbar-default">
              <div class="container-fluid">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Acceso Rápido</a> 
                </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conbranza <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cobranzaAdmin/index_proforma.php">Proforma</a></li>
            <li><a href="cobranzaAdmin/index_consultarProforma.php">Consultar Proforma</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="cobranzaAdmin/index_cobro.php">Cobros</a></li>
            <li><a href="#">Proyectos Vendidos</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Producción <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  
              <div class="panel panel-danger">
                <h3>Bienvenido Administrador</h3>
              <!-- <h4> <?php echo $_SESSION['usuario']['nombre']?></h4>-->
                    <h4>Sistema de seguimientos de proyectos</h4>
                     <h6>SSP</h6>  
                      <center><img class="img-responsive " src="./assets/img/admn.jpg" alt="Grupo Plasma Automation"></center>
            </div>
            <div class="panel panel-danger">
              <!--Inicio de gráfica de pagos
                <section class="col-lg-7 connectedSortable ui-sortable">-->
                    <div class="nav-tabs-costum" style="cursor:move">
                        <ul class="nav nav-tabs pull-right ui-sortable-handle">
                          <li class="active"></li>
                          <li class="pull-left header">
                             <i class="fa fa-bar-char"></i>
                                Estatus
                          </li>
                       </ul>
            <div class="tab-content no-padding">
             <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <?php 
                $sql = "SELECT p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
                        c.No_Cliente,c.nombre as nombre,
                         co.id_cobro, co.porcentaje as porcentaje, 
                            v.id_vendedor, v.nombre as vendedor, 
                                pr.id, pr.modelo as modelo from proforma p 
                                inner join cliente c on c.No_Cliente = p.id_cliente 
                                inner join vendedor v on v.id_vendedor = p.id_vendedor 
                                inner join cobro co on p.id_proforma = co.id_proforma
                                    inner join proyecto pr on pr.id = p.id_proyecto";
                $resultado = mysql_query($sql, $conexion);
            ?>
            <table id="datatable">
              <thead>
                <tr>
                   <th>Cliente</th>
                   <th>Porcentaje del pago</th>
                </tr>
           </thead>
          <tbody>
               <?php 
                    while ($porcentaje = mysql_fetch_assoc($resultado)){
                        echo "<tr><th>".$porcentaje['nombre']."</th> <td>".$porcentaje['porcentaje']."</td></tr>";
                   }
                ?>
                </tr> 
          </tbody>
            </table>
        </div>
            </div>
          
<!-- Fin de graficas-->
            </div>
            <div class="panel-footer"></div>
          </div>
        </section>
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- Slimscroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js"></script>   
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/js/jquery.selectedoption.plugin.js"></script>
     <script type="text/javascript">
    Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Gráfica del estado de pago de los clientes'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Pago en porcentaje'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
</script>
  </body>
</html>
