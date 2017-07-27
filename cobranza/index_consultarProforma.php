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
    <title>Consulta Proforma | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
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
   <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon"/>

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
            Proforma
            <small>Consulta</small>
          </h1>
        </section>
        <section class="content">
      <div class="col-lg-12">
         <div class="row">
          <div class="panel">
            <div class="panel-heading">
 <!--Breadcrumb -->
              <section class="content-header">
                <ol class="breadcrumb">
                   <i class="fa fa-dashboard"></i>
                    <li><a href="">Home</a></li>
                    <li class="active">Consulta Proforma
                   </li>
                </ol>
              </section>
<!--Termina breadcrumb.--> 
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Número de factura</th>
                    <th>Fecha de Inicio</th>
                    <th>Cliente</th>  
                    <th>Estatus</th>                  
                  </tr>
                </thead>
                <tbody>
                <?php
                  $host = 'localhost';
                  $user = 'root';
                  $password = '';
                  $bd = 'ssp';
                  $conexion = @mysql_connect($host, $user, $password);
                  mysql_query("SET NAMES 'utf8'");
                  @mysql_select_db($bd, $conexion);
                  $sql = "SELECT p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, c.No_Cliente, p.estatus as estatus, c.nombre as nombre from proforma p inner join cliente c on c.No_Cliente = p.id_cliente  ORDER BY no_factura DESC";
                  $resultado = mysql_query($sql, $conexion);
                  while ($proforma = mysql_fetch_assoc($resultado)) {
                    echo "<tr>";
                     echo "<td><a href='consultas.php?ver_proforma_id=".$proforma['id_proforma']."' class='btn btn-rounded btn-primary ver-proyecto' title='Ver proyecto' ><i class='fa fa-plus'></i></a></td>";
                    echo "<td>00".$proforma['no_factura']."</td>";
                    echo "<td>".$proforma['fecha_inicio']."</td>";
                    echo "<td>".$proforma['nombre']."</td>";
                    echo "<td>".($proforma['estatus']==1?'Activo':'Inactivo')."</td>";
                    echo "</tr>";
                  }
                  function pr($var){
                    echo "<pre>";
                    print_r($var);
                    echo "</pre>";
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('.eliminar-proforma').click(function(evt){
          evt.preventDefault();
          var url = $(this).attr('href');          
          if(confirm("¿Estás seguro de quieres dar de baja esta proforma?")){
            console.log(url);
            window.location.href = url;
          }
        });
      });
    </script>
  </body>
</html>
