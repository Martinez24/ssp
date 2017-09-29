<?php include('../login/validarsesion.php');?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyectos Vendidos | Dashboard</title>
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
    <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
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
     <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon"/>
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
            Proyectos
            <small> Vendidos</small>
          </h1>
        </section>
        <section class="content">
      <div class="col-lg-12">
         <div class="row">
          <div class="panel">
            <div class="panel-heading">
              <a class="btn btn-success pull-right" href="consultas.php?reporte_vendidos"><i class="fa  fa-file-excel-o"></i> Exportar Reporte</a><br>
            </div>
            <div class="panel-body">
              <table class="table" id="productos">
                <thead>
                  <tr>
                    <th>No. Factura</th>                    
                    <th>Cliente</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Entrega</th>
                    <th>No. Serie</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Vendedor</th>
                    <th>Estatus</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $host = 'localhost';
                  $user = 'root';
                  $password = '123';
                  $bd = 'ssp';
                  $conexion = @mysql_connect($host, $user, $password);
                  @mysql_select_db($bd, $conexion);
                  
                  $sql = "SELECT 
                        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
                         c.No_Cliente,c.nombre as nombre_cliente, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio as municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, c.c_p as cp,
                         e.id_estado, e.estado as estado, 
                         co.id_cobro, co.estatus as estatus, co.porcentaje as porcentaje,
                         v.id_vendedor, v.nombre as vendedor, 
                         pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
                         from proforma p 
                         inner join cliente c on c.No_Cliente = p.id_cliente 
                         inner join vendedor v on v.id_vendedor = p.id_vendedor  
                         inner join proyecto pr on pr.id = p.id_proyecto 
                         inner join estado e on c.id_estado = e.id_estado 
                         inner join cobro co on p.id_proforma = co.id_proforma where co.estatus = 0 ";
                  $resultado = mysql_query($sql, $conexion);
                  while ($proyecto = mysql_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>00".$proyecto['no_factura']."</td>";
                    echo "<td>".$proyecto['nombre_cliente']."</td>";
                    echo "<td>".$proyecto['fecha_inicio']."</td>";
                    echo "<td>".$proyecto['fecha_entrega']."</td>";
                    echo "<td>".$proyecto['numero_serie']."</td>";
                    echo "<td>".$proyecto['modelo']."</td>";
                    echo "<td>".$proyecto['marca']."</td>";
                    echo "<td>".$proyecto['vendedor']."</td>";
                    echo "<td>".($proyecto['estatus']==1?'En proceso':'Vendido')."</td>";
                    echo "<td><a href='consultas.php?ver_proforma_id=".$proyecto['id_proforma']."' class='btn btn-rounded btn-primary ver-proyecto' title='Ver proyecto' ><i class='fa fa-plus'></i></a></td>";
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
    <script src="../assets/plugins/format-number/jquery.format-number.plugin.js"></script>
    <!-- DataTables -->
    <script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.money').formatNumber();
        $('#productos').DataTable();
      });
    </script>
  </body>
</html>
