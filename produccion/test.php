<?php include('../login/validarsesion.php');?>
<?php
  date_default_timezone_set('America/Mexico_City');
  //session_start();
     if(!isset($_SESSION['tarea'])){
    $_SESSION['tarea'] = array('proyecto' => NULL, 'gestiones' => array());
    $tarea = $_SESSION['tarea'];
  } else {
    $tarea = $_SESSION['tarea'];
  }
  $host = 'localhost';
  $user = 'root';
  $password = '123';
  $bd = 'tablero';
  $conexion = @mysql_connect($host, $user, $password);
  @mysql_select_db($bd, $conexion);
 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GPA | Dashboard</title>
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
        <section class="content-header">
          <h1>
            Ficha
            <small>Técnica</small>
          </h1>
        </section>
        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
            <div class="col-md-12 text-right">
              <a href="#" class="btn btn-success" id="agregar-proyecto"><i class="fa fa-plus"> Agregar Proyecto</i></a>
              
              <a href="#" class="btn btn-success" id="agregar-tarea"><i class="fa fa-plus-square"> Agregar Tarea</i></a>
              <a href="gestiones.php?cancelar_tarea" class="btn btn-danger"><i class="fa fa-times-circle-o"> Cancelar</i></a>
            </div>
              <h2 class="page-header">
                <i class="fa fa-globe"></i> 
                <?php 
                  echo (isset($tarea['proyecto']['no_factura'])?"Proyecto para: ".$tarea['proyecto']['nombre']:"Seleccione una Factura");
                ?>
                <small class="pull-right">Fecha: <?php echo date('d/m/Y');?></small>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col" id="info-proyecto">
            <?php
               if(isset($tarea['proyecto']['no_factura'])){ 
                echo "No. de factura del proyecto: <b>00".$tarea['proyecto']['no_factura']."</b><br>";

                echo "<div class='col-xs-3'>
                      <address>
                      <h5>Cliente</h5>
                      </address>
                        <b>No. Cliente: </b>".$tarea['proyecto']['no_cliente']."<br>
                        <b>Nombre: </b><br>".$tarea['proyecto']['nombre']."<br>
                        <b>Domicilio: </b><br>".$tarea['proyecto']['domicilio']."<br>
                        <b>Ciudad: </b><br>".$tarea['proyecto']['municipio']."<br>
                        ".$tarea['proyecto']['estado']."
                      </div>";                
                echo "<div class='col-sm-3 invoice-col'>
                <br>
                <br>
                      <b>CP: </b><br>".$tarea['proyecto']['cp']."<br>
                      <b>RFC: </b><br>".$tarea['proyecto']['rfc']."<br>
                      <b>Teléfono: </b><br>".$tarea['proyecto']['tel']."<br>
                      <b>Correo: </b><br>".$tarea['proyecto']['correo']."<br>
                      </div>";  
                echo "<div class='col-sm-3 invoice-col'>
                      <address>
                      <h4>Vendedor</h4>
                      </address>
                        <b>Nombre del vendedor: </b><br>".$tarea['proyecto']['vendedor']."<br>
                      </div>"; 
                echo "<div class='col-sm-3 invoice-col'>
                      <address>
                      <h4>Proyecto</h4>
                      </address>
                        <b>Fecha inicio: </b><br>".$tarea['proyecto']['fecha_inicio']."<br>
                        <b>Fecha entrega: </b><br>".$tarea['proyecto']['fecha_entrega']."<br>
                        <b>Descripción: </b><br>".$tarea['proyecto']['descripcion']."<br>
                      </div>"; 
              
              }
            ?>
            </div>
            <img class="pull-right" src="../assets/img/gpa.png" width="150">
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
          Hay no
            <div class="col-xs-12 table-responsive">
            <center><h5>Motor</h5></center>
              <table class="table table-striped">
                <thead>
                    <tr>
                     <th>Cantidad</th>
                      <th>Motor</th>
                      <th>No. de ejes</th>
                      <th>Descripción</th>                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php    
                   if(count($tarea['gestiones']) > 0){
                      foreach ($tarea['gestiones'] as $index => $gestion) {
                        echo "<tr class='tarea'>";
                  
                  //Vista de los datos 
                        echo "<td>".$gestion['cantidad']."</td>";
                        echo "<td>".$gestion['motor']."</td>";
                        echo "<td>".$gestion['no_ejes']."</td>";
                        echo "<td>".$gestion['descripcion_m']."</td>";
                        echo "<td><a href='gestiones.php?eliminar_tarea=".$index."' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></a></td>";
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

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
              <a href="gestiones.php?guardar_tarea" class="btn btn-success pull-right" id="guardar-tarea"><i class="fa fa-check-circle-o"></i> Guardar Tarea
              </a>
              <!--<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
              </button>-->
            </div>
          </div>
        </section>
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
      </footer>
    </div><!-- ./wrapper -->
    <!--MODALES-->
    <div class="modal fade" id="proyecto-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Busca un proyecto</h4>
          </div>
            <form class="form-horizontal" id="form-selecciona-proyecto" method="post" action="gestiones.php">
              <div class="modal-body">
                  <fieldset>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Proyecto</label>
                        <div class="col-lg-10">
                          <select name="proyecto_id" class="form-control">
                            <?php
                                $sql = "SELECT * FROM proyecto ORDER BY etiqueta";
                                $resultado = mysql_query($sql, $conexion);
                                while ($proyecto = mysql_fetch_assoc($resultado)) {
                                  echo "<option value='".$proyecto['id_proyecto']."'>".$proyecto['etiqueta']."</option>";
                                }
                              ?>
                          </select>
                        </div> 
                      </div>
                    </div>
                  </fieldset>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" value="Agregar Proyecto" name="agrega_proyecto">
              </div>
            </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="tarea-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Agregar Motor</h4>
          </div>
            <form class="form-horizontal" id="form-agrega-tarea" method="post" action="test1.php">
               <div class="modal-body">
                  <fieldset>
                    <div class="col-md-12">
                      
                      
                      
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Cantidad</label>
                          <div class="col-lg-10">
                            <input type="number" name="cantidad_m" required id="cantidad" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                         <label class="col-lg-2 control-label">Motor</label>
                          <div class="col-lg-10">
                           <input type="text" name="motor" required id="motor" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                         <label class="col-lg-2 control-label">No. de ejes</label>
                          <div class="col-lg-10">
                           <input type="text" name="no_ejes" required id="no_ejes" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                         <label class="col-lg-2 control-label">Descripción</label>
                        <textarea name="descripcion_m" rows="10" cols="30" class="form-control">Observaciones del área...</textarea>
                      </div>
                    
                    </div>
                  </fieldset>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" value="Agregar Tarea" name="agrega_tarea">
              </div>
            </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    <!--MODALES-->
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
    <script src="../assets/js/parsley.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#agregar-proyecto').click(function(){
          $('#proyecto-modal').modal('show');
        });
        $('#agregar-tarea').click(function(){
          $('#tarea-modal').modal('show');
        });
        $('#guardar-tarea').click(function(evt){
          evt.preventDefault();
          var url = $(this).attr('href');
          var proyecto  = $('#info-proyecto').children().length > 0 ? true: false;
          var tarea = $('.tarea').length;
          if(proyecto == false){
            alert("Para guardar necesitas agregar un proyecto");
            return;
          }
          if(tarea <= 0){
            alert("Agrega al menos un departamento al proyecto antes de guardar");
            return; 
          } else {
            window.location.href = url;
          }
        });
        $('#form-agrega-tarea').parsley('validate');
      });
    </script>
  </body>
</html>