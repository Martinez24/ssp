 <?php include('../login/validarsesion.php');?>
 <!--Conexion a la base de datos -->
 <?php
  $host = 'localhost';
  $user = 'root';
  $password = '123';
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
    <title>Proforma | Dashboard</title>
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
            <small></small>
          </h1>
        </section>
        <section class="content">
      <div class="col-lg-12">
         <div class="row">
          <div class="panel">
            <div class="panel-heading">

<!--Aplicación de modal con Bootstrap -->
            <button class="btn btn-danger" data-toggle="modal" data-target="#miventana">Alta de Proforma</button>
 <!--Breadcrumb -->
              <section class="content-header">
                <ol class="breadcrumb">
                   <i class="fa fa-dashboard"></i>
                    <li><a href="">Home</a></li>
                    <li class="active">Proforma
                   </li>
                </ol>
              </section>
<!--Termina breadcrumb.-->
            </div>
            <div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4>Alta de proforma</h4>
                  </div>
                  <div class="modal-body">
<!--Inicia formulario de agregar usuario-->
                    <section class="content">
                             <div class="row">
                              <div class="panel">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                  <form method="post" action="proforma.php" enctype="multipart/form-data" id="form">
<!-- Inician campos del formulario -->
                                    <div class="form-group">
                                      <label for="no_factura">Número de factura:</label>
                                      <input type="text" name="no_factura" required id="no_factura" placeholder="Ej: 83" class="form-control" autofocus>
                                    </div>
                                    <div class="form-group">
                                      <label for="fecha_inicio">Fecha inicio:</label>
                                      <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Cliente:</label>
                                      <select name="id_cliente" class="form-control">
                                      <?php
                                      $sql = "SELECT * FROM cliente";
                                      $resultado = mysql_query($sql, $conexion);
                                       while ($cliente = mysql_fetch_assoc($resultado)) {
                                          echo "<option value='".$cliente['No_Cliente']."'>".$cliente['nombre']."</option>";
                                      }
                                      ?>
                                      </select>
                                    </div>
                                     <div class="form-group">
                                      <label>Vendedor:</label>
                                      <select name="id_vendedor" class="form-control">
                                      <?php
                                      $sql = "SELECT * FROM vendedor";
                                      $resultado = mysql_query($sql, $conexion);
                                       while ($vendedor = mysql_fetch_assoc($resultado)) {
                                          echo "<option value='".$vendedor['id_vendedor']."'>".$vendedor['nombre']."</option>";
                                      }
                                      ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="fecha_entrega">Fecha de entrega:</label>
                                      <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control">
                                    </div>
                                     <div class="form-group">
                                      <label>Proyecto:</label>
                                      <select name="id_proyecto" class="form-control">
                                      <?php
                                      $sql = "SELECT * FROM proyecto";
                                      $resultado = mysql_query($sql, $conexion);
                                       while ($proyecto = mysql_fetch_assoc($resultado)) {
                                          echo "<option value='".$proyecto['id']."'>".$proyecto['no_serie']."</option>";
                                      }
                                      ?>
                                      </select>
                                    </div>
                                   <div class="form-group">
                         			<label class="col-lg-2 control-label">Descripción</label>
                       				 <textarea name="descripcion" rows="10" cols="30" class="form-control">Descripción del proyecto
                       				 </textarea>
                      			  </div>
                                    
<!-- Termina campos del formulario -->
                                    <input type="submit" name="guardar_nuevo" value="Guardar" class="btn btn-primary">

                                  </form>
                                </div>
                              </div>
                            </div>
                        </section>
<!Termina Formulario -->
                  </div>
                </div>
              </div>
            </div>

            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Número de factura</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Entrega</th>  
                    <th>Cliente</th>                  
                  </tr>
                </thead>
                <tbody>
                <?php
                  $host = 'localhost';
                  $user = 'root';
                  $password = '123';
                  $bd = 'ssp';
                  $conexion = @mysql_connect($host, $user, $password);
                  mysql_query("SET NAMES 'utf8'");
                  @mysql_select_db($bd, $conexion);
                  $sql = "SELECT p.id_proforma, p.estatus, p.no_factura as no_factura, p.fecha_entrega as fecha_entrega, p.fecha_inicio as fecha_inicio, c.No_Cliente, c.nombre as nombre from proforma p inner join cliente c on c.No_Cliente = p.id_cliente where p.estatus = 1 ORDER BY no_factura DESC";
                  $resultado = mysql_query($sql, $conexion);
                  while ($proforma = mysql_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td><a href='proforma.php?editar_proforma_id=".$proforma['id_proforma']."' class='btn btn-rounded btn-primary editar-proforma'><i  title='Editar proforma' class='fa fa-pencil'></i></a></td>";
                   echo "<td><a href='proforma.php?eliminar_proforma_id=".$proforma['id_proforma']."' class='btn btn-primary eliminar-proforma'><i title='Desactivar proforma' class='fa fa-remove eliminar-proforma'></i></a></td>";
                    echo "<td>00".$proforma['no_factura']."</td>";
                    echo "<td>".$proforma['fecha_inicio']."</td>";
                    echo "<td>".$proforma['fecha_entrega']."</td>";
                    echo "<td>".$proforma['nombre']."</td>";
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
