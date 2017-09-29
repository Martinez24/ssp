<?php 
  include('../login/validarsesion.php');
  date_default_timezone_set('America/Mexico_City');

  if(!isset($_SESSION['tarea'])){
    $_SESSION['tarea'] = array('proyecto' => NULL, 'gestiones' => array());
    $tarea = $_SESSION['tarea'];
  } else {
    $tarea = $_SESSION['tarea'];
  }

  $host = 'localhost';
  $user = 'root';
  $password = '123';
  $bd = 'ssp';
  $conexion = @mysql_connect($host, $user, $password);
  @mysql_select_db($db, $conexion);

?> 
  
<!DOCTYPE html>
<html lang="es">
  <head>
     <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon"/>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GPA | Ficha</title>
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
            Ficha
            <small> Técnica</small>
          </h1>
        </section>
        <!-- Main content -->
        <section class="invoice">
        <div class="row">
          <a href="#" class="btn btn-success" id="agregar-proyecto"><i class="fa fa-plus"> Agregar Proyecto</i></a>
        </div>
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
              <i class="fa fa-globe"></i>
                <?php 
                  echo (isset($tarea['proyecto']['no_factura'])?"Proyecto para: ".$tarea['proyecto']['nombre']:"Seleccione un Proyecto");
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
                echo "No. de factura del proyecto: <b>00".$tarea['proyecto']['no_factura']."<b><br>";

                echo "<div class='col-sm-4 invoice-col'>
                      <address>
                      <strong>Cliente</strong><br>
                      Hola <br>
                      Como<br>
                      </address>

                      </div>";
                echo "<address>";
                echo "<b>Etiqueta del proyecto: </b>".$tarea['proyecto']['no_factura']."  "."<b> Modelo de la máquina: </b>".$tarea['proyecto']['modelo']."<br>";
               
                echo "<b>Nombre de la máquina: </b>".$tarea['proyecto']['maquina']."<br>";
                echo "<b>Nombre del cliente: </b>".$tarea['proyecto']['nombre']."<br>";
                echo "<b>Destino: </b>".$tarea['proyecto']['destino']."<br>";
                echo "<b>Fecha entrega: </b>".$tarea['proyecto']['fecha_entrega']."<br>";
                echo "<b>Fecha creación: </b>".$tarea['proyecto']['fecha_creacion']."<br>";
                echo "</address>";
              }
            ?>
            </div>
            <img class="pull-right" src="../assets/img/gpa.png" width="150">
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          
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
            <form class="form-horizontal" id="form-selecciona-proyecto" method="post" action="ficha.php">
              <div class="modal-body">
                  <fieldset>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Proyecto</label>
                        <div class="col-lg-10">
                          <select name="proforma_id" class="form-control">
                            <?php
                                $sql = "SELECT * FROM proforma ORDER BY no_factura";
                                $resultado = mysql_query($sql, $conexion);
                                while ($proyecto = mysql_fetch_assoc($resultado)) {
                                  echo "<option value='".$proyecto['id_proforma']."'>00".$proyecto['no_factura']."</option>";
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
    <!--MODALES-->
    <!-- Slimscroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/js/jquery.selectedoption.plugin.js"></script>
    <script src="assets/plugins/format-number/jquery.format-number.plugin.js"></script>
    <script src="assets/js/parsley.js"></script>
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