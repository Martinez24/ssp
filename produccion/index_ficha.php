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
                  echo (isset($tarea['proyecto']['no_factura'])?"Proyecto para: ".$tarea['proyecto']['nombre']:"Seleccione una Factura");
                ?>
                <small class="pull-right">Fecha: <?php echo date('d/m/Y');?></small>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->

          <div class="row invoice-info">
            <div class="col-sm-9 invoice-col" id="info-proyecto">
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
        <div class="box box-default">
          <div class="box-header with-border"> 
          <h3 class="box-title">Ficha Técnica</h3>
            <div class="box-body pad" style="display: block;">
              <div class="col-md-2">
                  <div class="form-group">
                  <h5>Tipo de servicio</h5>
                  <!--Inicia formulario de ficha tecnica-->
                    <form id="frm-alumno" method="post" action="ficha_tecnica.php" enctype="multipart/form-data" id="form">
                      <div class="form-group">
  <!--DIV Tipo servicio-->
                         <label for="cantidad">Cantidad:</label>
                          <input type="number" name="cantidad" required id="cantidad" placeholder="Ej: 1,2,3" class="form-control" autofocus>
                           </div>
                            <div class="form-group">
                             <label>Tipo de servicio:</label>
                             <select name="servicio" class="form-control select2 select2-hidden-accesible" style="width: 100%;" tabindex="-1" aria-hidde="true">
                               <option selected="selected">Pantografo</option>
                               <option value="Retrofit">Retrofit</option>
                               <option value="Maquila">Maquila</option>
                               <option value="Otros">Otros</option>
                             </select>
                            </div>
                           <div class="form-group">
                            <label for="modelo">Modelo:</label>
                             <input type="text" name="modelo" id="modelo" placeholder="Ej: Dinocut" class="form-control">
                            </div> 
                          <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                             <textarea name="descripcion" rows="2" cols="10" class="form-control"></textarea>
              </div> 
                  </div>  
                  </div>                             
                    <div class="col-md-2">
  <!--DIV Sistema de corte-->
                          <div class="form-group">
                           <h5>Sistema de corte</h5>
                              <div class="form-group">
                               <label for="cantidad_s">Cantidad</label>
                                 <input type="number" name="cantidad_s" required id="cantidad_s" placeholder="Ej: 1,2,3" class="form-control" autofocus>
                              </div>
                              <div class="form-group">
                                <label>Tipo de servicio:</label>
                                <select name="sistema" class="form-control select2 select2-hidden-accesible" style="width: 100%;" tabindex="-1" aria-hidde="true">
                               <option selected="selected">Plasma</option>
                               <option>Oxicorte</option>
                               <option>Laser</option>
                               <option>Waterjet</option>
                               <option>Otros</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="modelo_s">Modelo:</label>
                                 <input type="text" name="modelo_s" id="modelo_s" placeholder="Ej: XPR-300" class="form-control">
                              </div> 
                              <div class="form-group">
                               <label for="voltaje">Voltaje:</label>
                              <input type="number" name="voltaje" id="voltaje" placeholder="Ej: 440" class="form-control">
                              </div>  
                              <div class="form-group">
                               <label for="observacion">Observación:</label>
                              <textarea name="observacion" rows="2" cols="10" class="form-control"></textarea>
                              </div> 
                                   
                          </div>
                        </div>
                       
                        <div class="col-md-2">
 <!--DIV Controlador-->
                          <div class="form-group">
                           <h5>Controlador</h5><br>
                              <div class="form-group">
                               <label for="cantidad_c">Cantidad</label>
                                 <input type="number" name="cantidad_c" required id="cantidad_c" placeholder="Ej: 1,2,3" class="form-control" autofocus>
                              </div>
                              <div class="form-group">
                                <label>Controlador:</label>
                             <select name="controlador" class="form-control select2 select2-hidden-accesible" style="width: 100%;" tabindex="-1" aria-hidde="true">
                               <option selected="selected">Edge TI</option>
                               <option>Edge Pro</option>
                               <option>Edge Connect</option>
                               <option>Otros</option>
                             </select>
                              </div>
                              <div class="form-group">
                                <label for="ejes">No. Ejes</label>
                                 <input type="number" name="ejes" id="ejes" class="form-control">
                              </div>  
                              <div class="form-group">
                               <label for="sd">Servo y Drive:</label>
                                <input type="text" name="sd" id="sd" placeholder="Ej: Bosch" class="form-control">
                              </div> 
                              <div class="form-group">
                               <label for="observacion_c">Observación:</label>
                              <textarea name="observacion_c" rows="2" cols="10" class="form-control"></textarea>
                              </div> 
                                    
                          </div>
                        </div>
                        <div class="col-md-2">
 <!--DIV sensor-->
                          <div class="form-group">
                           <h5>Sensor de altura</h5>
                              <div class="form-group">
                               <label for="cantidad_a">Cantidad</label>
                                 <input type="number" name="cantidad_a" required id="cantidad_a" placeholder="Ej: 1,2,3" class="form-control" autofocus>
                              </div>
                              <div class="form-group">
                                 <label>Sensor de altura</label>
                             <select  name="sensor" class="form-control select2 select2-hidden-accesible" style="width: 100%;" tabindex="-1" aria-hidde="true">
                               <option selected="selected">Sensor Connect</option>
                               <option>Sensor TI</option>
                               <option>Sensor Arcglide</option>
                               <option>Otros</option>
                             </select>
                              </div>
                              <div class="form-group">
                                <label for="modelo_a">Modelo</label>
                                 <input type="text" name="modelo_a" id="modelo" placeholder="Ej: THC" class="form-control">
                              </div> 
                              <div class="form-group">
                               <label for="observacion_c">Observación:</label>
                              <textarea name="observacion_a" rows="2" cols="10" class="form-control"></textarea>
                              </div> 
                          </div>                        
                        </div>
                        <div class="col-md-3">
  <!--DIV GUIAS-->
                        <div class="form-group">
                           <h5>Posición</h5>
                              <div class="form-group">
            <!--Posición-->
                               <label>Posición</label>
                             <select name="posicion" class="form-control select2 select2-hidden-accesible" style="width: 100%;" tabindex="-1" aria-hidde="true">
                               <option selected="selected">Trasversal</option>
                               <option>Dual Gantry</option>
                               <option>Gantry</option>
                             </select>
                              </div>
                              <div class="form-group">
            <!---Guía-->
                                 <label>Guía</label>
                             <select name="guia" class="form-control select2 select2-hidden-accesible" style="width: 100%;" tabindex="-1" aria-hidde="true">
                               <option selected="selected">HSR20A1SS</option>
                               <option>HSR25A1SS</option>
                             </select>
                              </div>
                               <div class="form-group">
            <!---Balero-->
                                 <label>Balero</label>
                             <select name="balero" class="form-control select2 select2-hidden-accesible" style="width: 100%;" tabindex="-1" aria-hidde="true">
                               <option selected="selected">HSR20</option>
                               <option>HSR25</option>
                             </select>
                              <label for="c">C:</label>
                                <input type="number" name="c" id="c" placeholder="Ej: 1" class="form-control">
                              </div> 
                              </div>
            <!--Cremallera-->
                              <div class="form-group">
                               <label for="cremallera">Cremallera:</label>
                              <input type="text" name="cremallera" id="cremallera" placeholder="Ej: BAL-0112" class="form-control">
                              </div> 
                            <div class="form-group">
                               <label for="piñon">Piñon:</label>
                            <input type="text" name="piñon" id="piñon" placeholder="Ej: BAL-0147" class="form-control">
                            <label for="c1">C:</label>
                                <input type="number" name="c1" id="c1" placeholder="Ej: 2" class="form-control">
                              </div>
                          </div>
                          </form>
    <!--Aqui se ve el motor agregado-->
      <<div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                    <tr>
                     <th>Fecha de inicio</th>
                      <th>Fecha entrega</th>
                      <th>Observación</th>
                      <th>Estado del área</th>                   
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
                        echo "<td>".$gestion['ejes']."</td>";
                        echo "<td>".$gestion['descripcion']."</td>";
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
          <!--Terminan divs-->
    <!--Motor-->
    <a href="#" class="btn btn-success" id="agrega-motor"><i class="fa fa-plus">Agregar aa  motor</i></a>
    <div class="modal fade" id="motor-modal">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dissmiss="modal" aria-label="Close"><span aria-hidden="true"></span>x</button><h4 class="modal-title">Agregar motor</h4>
        </div>
        <form class="form-horizontal" id="form-agrega-motor" method="post" action="ficha_tecnica.php">
          <div class="modal-body">
          <!--Motor-->
                  <div id="alumnos" class="row">
                    <div id="lo-que-vamos-a-copiar">
                      <div class="col-xs-12">
                        <div class="well well-sm">
                          <h5>Motor</h5>
                              <div class="form-group">
                                 <label for="cantidad_m">Cantidad</label>
                                  <input type="number" name="cantidad_m" required id="cantidad_m" placeholder="Ej: 1,2,3" class="form-control" autofocus>
                              </div>
                              <div class="form-group">
                                 <label for="motor">Motor</label>
                                  <input type="text" name="motor" id="motor" placeholder="Ej: TPK 010S" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="no_ejes">No. de ejes</label>
                                 <input type="text" name="no_ejes" id="no_ejes" placeholder="Ej: MSK050" class="form-control">
                              </div> 
                              <div class="form-group">
                                <label for="observacion_m
                                ">Observación:</label>
                                <textarea name="observacion_m" rows="2" cols="10" class="form-control"></textarea>
                              </div>  
                        </div>
                      </div>  
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-success" value="Agregar Motor" name="agrega-motor">  
                            </div>          
                    </div>
            
          </div>
        </form>
      </div>
      </div>
    </div>
   
    <!--Pivote
                   <div class="col-md-12">
                          <div class="form-group">
                            <h5><label for="detalle">Detalle de trabajos adicionales mecanicos y electrónicos</label></h5>
                            <textarea name="detalle" rows="2" cols="3" class="form-control"></textarea>
                          </div>
                        </div>-->         
       
        </section>
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
    <!--JQuery 2.2.3 -->
    <script src="../assets/plugins/jQuery/jquery-2.2.4.min.js"></script>
    <!--SELECT2-->
    <script src="../assets/plugins/select2/select2.full.min.js"></script>
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
        $('#agrega-motor').click(function(){
          $('#motor-modal').modal('show');
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
